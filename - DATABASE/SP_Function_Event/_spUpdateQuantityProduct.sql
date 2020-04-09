DROP PROCEDURE IF EXISTS `_spUpdateQuantityProduct`;

DELIMITER $$
CREATE PROCEDURE `_spUpdateQuantityProduct`(orderID VARCHAR(200))
BEGIN

    DECLARE loop0_eof BOOLEAN DEFAULT FALSE; 

		/***Declare your name ID***/
      DECLARE cur_oiID VARCHAR(200);
      DECLARE cur_pID VARCHAR(200); 
      DECLARE cur_pvID VARCHAR(200); 
      
      DECLARE cur_oiQty VARCHAR(200); 
      DECLARE cur_pQty VARCHAR(200); 
      DECLARE cur_pvQty VARCHAR(200); 
      
		DECLARE cur0 CURSOR FOR 
      
      	/***Select your query here to get PK or ID***/
			SELECT oiID FROM VividStoreOrderItems WHERE oID = orderID;

      DECLARE CONTINUE HANDLER FOR NOT FOUND SET loop0_eof = TRUE; 

      OPEN cur0; 

            loop0: LOOP 
                  FETCH cur0 INTO cur_oiID; 
             
                  IF loop0_eof THEN 
                        LEAVE loop0; 
                  END IF; 

						/***Your Process Query***/
						/***Update Quantity Product***/
						SET cur_pvID = '';
						SET cur_pID = '';
						SET cur_oiQty = '';
						SELECT pvID, pID, oiQty INTO cur_pvID, cur_pID, cur_oiQty FROM VividStoreOrderItems WHERE oiID = cur_oiID;
						
						IF cur_pvID > 0 THEN
							SET cur_pvQty = (SELECT pvQty FROM VividStoreProductVariations WHERE pvID = cur_pvID);
							UPDATE VividStoreProductVariations SET pvQty = (cur_pvQty + cur_oiQty)  WHERE pvID = cur_pvID;
						ELSE
							SET cur_pQty = (SELECT pQty FROM VividStoreProducts WHERE pID = cur_pID);
							UPDATE VividStoreProducts SET pQty = (cur_pQty + cur_oiQty) WHERE pID = cur_pID;
						END IF;

            END LOOP loop0; 

      CLOSE cur0; 

END