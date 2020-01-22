
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
-- =============================================
-- Author:		CARLOS VALENTIN MICHAUS BARCENAS
-- Create date: 21-01-2020
-- Description:	OBTENER EVENTOS DE LAS SALAS
-- =============================================
CREATE PROCEDURE sp_INCSALAS_ObtenerEventosSalas
	-- Add the parameters for the stored procedure here
	@CodSala INT
AS
BEGIN
	-- SET NOCOUNT ON added to prevent extra result sets from
	-- interfering with SELECT statements.
	SET NOCOUNT ON;

    -- Insert statements for procedure here
	sELECT * FROM tbl_Eventos Where CodSala = @CodSala
END
GO
