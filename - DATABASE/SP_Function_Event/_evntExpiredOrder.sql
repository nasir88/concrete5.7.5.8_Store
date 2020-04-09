DROP EVENT IF EXISTS `_evntExpiredOrder`;

DELIMITER $$
CREATE EVENT `_evntExpiredOrder` 
	ON SCHEDULE EVERY 1 SECOND
	DO BEGIN
	
		CALL _spDeleteExpiredOrder();
	    
	END