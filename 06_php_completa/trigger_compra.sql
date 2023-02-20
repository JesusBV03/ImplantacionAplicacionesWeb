DELIMITER $$
CREATE TRIGGER actualizarComprado AFTER INSERT ON comprados
FOR EACH ROW
BEGIN
  update pisos set comprado=1 where codigo_piso=new.codigo_piso;
END$$
DELIMITER ;