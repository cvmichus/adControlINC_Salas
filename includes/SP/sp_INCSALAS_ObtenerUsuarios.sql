
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
-- =============================================
-- Author:		CARLOS MICHAUS
-- Create date: 21-01-2020
-- Description:	OBTENER EMPLEADOS
-- =============================================
CREATE PROCEDURE sp_INCSALAS_ObtenerUsuarios
	-- Add the parameters for the stored procedure here
	
AS
BEGIN
	-- SET NOCOUNT ON added to prevent extra result sets from
	-- interfering with SELECT statements.
	SET NOCOUNT ON;

    -- Insert statements for procedure here
	SELECT T1.CodUsuario,T1.Usuario,T1.Perfil,T2.Nombre,T2.ApellidoM,T2.ApellidoP
		 from tbl_Usuarios T1 
		 INNER JOIN tbl_Detalles_Usuario T2 ON T1.CodUsuario = T2.codUsuario
END
GO
