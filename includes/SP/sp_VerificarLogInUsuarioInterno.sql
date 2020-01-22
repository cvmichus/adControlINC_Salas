
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
-- =============================================
-- Author:		Carlos Valentin Michaus Barcenas
-- Create date: 21/01/2020
-- Description:	SP para verificar usuario
-- =============================================
ALTER PROCEDURE sp_VerificarLogInUsuarioInterno
	-- Add the parameters for the stored procedure here
	@pass nvarchar(10),
    @usuario nvarchar(MAX)
AS
BEGIN
	-- SET NOCOUNT ON added to prevent extra result sets from
	-- interfering with SELECT statements.
	SET NOCOUNT ON;

    -- Insert statements for procedure here
	SELECT COUNT(*) as Existe FROM tbl_Usuarios T1 WHERE T1.Pass = @pass AND T1.Usuario =   @usuario and T1.Session = 0
END
GO
