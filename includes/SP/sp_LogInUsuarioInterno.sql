
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
-- =============================================
-- Author:		Carlos Valentin Michaus Barcenas
-- Create date: 12/01/2020
-- Description:	SP Verifica Login 
-- =============================================
CREATE PROCEDURE sp_LogInUsuarioInterno
	-- Add the parameters for the stored procedure here
	@pass nvarchar(10),
    @usuario nvarchar(max)
AS
BEGIN
	-- SET NOCOUNT ON added to prevent extra result sets from
	-- interfering with SELECT statements.
	SET NOCOUNT ON;

    -- Insert statements for procedure here
	SELECT T1.CodUsuario,T1.Usuario,T1.Perfil,T2.Nombre,T2.ApellidoM,T2.ApellidoP
		 from tbl_Usuarios T1 
		 INNER JOIN tbl_Detalles_Usuario T2 ON T1.CodUsuario = T2.codUsuario
		 WHERE T1.Pass = @pass and T1.Usuario = @usuario  and T1.estado = 1 and T1.Session = 0

END
GO
