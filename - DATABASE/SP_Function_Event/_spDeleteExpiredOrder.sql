DROP PROCEDURE IF EXISTS `_spDeleteExpiredOrder`;

DELIMITER $$
CREATE PROCEDURE `_spDeleteExpiredOrder`()
BEGIN

    DECLARE loop0_eof BOOLEAN DEFAULT FALSE; 

		/***Declare your name ID***/
      DECLARE cur_oID VARCHAR(200); 
       
      DECLARE cur0 CURSOR FOR 
      
      	/***Select your query here to get PK or ID***/
			SELECT oID FROM VividStoreOrders WHERE oPaidExpiredDate <= NOW();

      DECLARE CONTINUE HANDLER FOR NOT FOUND SET loop0_eof = TRUE; 

      OPEN cur0; 

            loop0: LOOP 
                  FETCH cur0 INTO cur_oID; 
             
                  IF loop0_eof THEN 
                        LEAVE loop0; 
                  END IF; 

						/***Your Process Query***/
						/***Update Quantity Product***/
						CALL _spUpdateQuantityProduct(cur_oID);
						
						/***Delete Record Order***/
						DELETE FROM VividStoreOrderItemOptions WHERE oiID IN (SELECT oiID FROM VividStoreOrderItems WHERE oID = cur_oID);
						DELETE FROM VividStoreOrderItems WHERE oID = cur_oID;
						DELETE FROM VividStoreOrderStatusHistories WHERE oID = cur_oID;
						DELETE FROM VividStoreOrderDiscounts WHERE oID = cur_oID;
                  DELETE FROM VividStoreOrders WHERE oID = cur_oID;

            END LOOP loop0; 

      CLOSE cur0; 

END