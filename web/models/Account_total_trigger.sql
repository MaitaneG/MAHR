CREATE TRIGGER Tr_total
 AFTER INSERT OF amount ON ACCOUNT
FOR EACH ROW
BEGIN
   SET @last_Total FLOAT;
    SELECT TOTAL INTO last_Total
    FROM ACCOUNT 
    ORDER by ID_MOVE DESC
    LIMIT 1;

    IF OLD.COLLECTOR="admin@erlete.eus"
        UPDATE ACCOUNT
        SET TOTAL=last_Total+OLD.AMOUNT
        WHERE ID=OLD.ID_MOVE;
    ELSE
        UPDATE ACCOUNT
        SET TOTAL=last_Total-OLD.AMOUNT
        WHERE ID=OLD.ID_MOVE;
        END IF;
END;
/



