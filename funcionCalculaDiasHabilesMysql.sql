DELIMITER $$

DROP FUNCTION IF EXISTS `diasHabiles`$$

CREATE FUNCTION diasHabiles(b date, a date) RETURNS int(11)
    DETERMINISTIC
    COMMENT 'calcula la diferencia de dias habiles entre 2 fechas'
BEGIN
 
DECLARE freedays int;
 
SET freedays = 0;
SET @x = DATEDIFF(b, a);
IF @x<0 THEN
SET @m = a;
SET a = b;
SET b = @m;
SET @m = -1;
ELSE
SET @m = 1;
END IF;
SET @x = abs(@x) + 1;
 
SET @w1 = WEEKDAY(a)+1;
SET @wx1 = 8-@w1;
IF @w1>5 THEN
SET @w1 = 0;
ELSE
SET @w1 = 6-@w1;
END IF;
 
SET @wx2 = WEEKDAY(b)+1;
SET @w2 = @wx2;
IF @w2>5 THEN
SET @w2 = 5;
END IF;
 
SET @weeks = (@x-@wx1-@wx2)/7;
SET @noweekends = (@weeks*5)+@w1+@w2;
 
SET @result = @noweekends-freedays;
SET @feriado=(SELECT COUNT(*) FROM dias_feriados WHERE dia_feriado BETWEEN a AND b);

RETURN (@result*@m)-@feriado;

END$$
 
DELIMITER ;