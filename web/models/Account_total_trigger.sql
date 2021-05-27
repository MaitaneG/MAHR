CREATE TRIGGER `Tr_total` BEFORE INSERT ON `account`
 FOR EACH ROW BEGIN 
    declare last_Total FLOAT; 
    SELECT TOTAL INTO last_Total FROM account ORDER by ID_MOVE DESC LIMIT 1; 

    IF (new.COLLECTOR="admin@erlete.eus") then 
         set new.total = last_Total+new.amount;

    ELSE set new.total = last_Total-new.amount;

    END IF; 
END

CREATE TRIGGER `new_can` AFTER INSERT ON `cans`
 FOR EACH ROW begin
	insert into account(payer,collector,date,amount,concept)
	values ("admin@erlete.eus","cans@cans.com",curdate(),new.price,"Buy a new can");
end

CREATE TRIGGER `new_fee` AFTER INSERT ON `members`
 FOR EACH ROW begin
	insert into fees(year,mail,amount) values (year(now()),new.mail,30);
end
