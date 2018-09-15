<?php

/**
 * @package   Yii2-Auth
 * @author    José Peña <joepa37@gmail.com>
 * @link https://plus.google.com/+joepa37/
 * @copyright Copyright (c) 2018 José Peña
 * @license http://www.apache.org/licenses/LICENSE-2.0
 * @version   1.0.0
 */

use gearsoftware\db\TranslatedMessagesMigration;

class m170719_073538_i18n_es_core_auth extends TranslatedMessagesMigration
{
	public function getLanguage()
	{
		return 'es-ES';
	}

	public function getCategory()
	{
		return 'core/auth';
	}

	public function getTranslations()
	{
		return [
			'Are you sure you want to delete your profile picture?' => '¿Seguro que quieres eliminar la foto de tu perfil?',
			'Are you sure you want to unlink this authorization?' => '¿Está seguro de que desea desvincular esta autorización?',
			'Authentication error occurred.' => 'Se ha producido un error de autenticación.',
			'Authorization' => 'Autorización',
			'Authorized Services' => 'Servicios Autorizados',
			'Captcha' => 'Captcha',
			'Change profile picture' => 'Cambiar foto de perfil',
			'Check your E-mail for further instructions' => 'Revise su correo electrónico para obtener más instrucciones',
			'Check your e-mail {email} for instructions to activate account' => 'Consulta tu correo electrónico {email} para obtener instrucciones sobre cómo activar la cuenta.',
			'Click to connect with service' => 'Haga clic para conectarse con el servicio',
			'Click to unlink service' => 'Haga clic para desvincular el servicio',
			'Confirm E-mail' => 'Confirmar correo electrónico',
			'Confirm' => 'Confirmar',
			'Could not send confirmation email' => 'No se pudo enviar el correo electrónico de confirmación',
			'Current password' => 'Contraseña actual',
			'E-mail confirmation for' => 'Confirmación de correo electrónico para',
			'E-mail confirmed' => 'Correo electrónico confirmado',
			'E-mail is invalid' => 'El correo electrónico es invalido',
			'E-mail with activation link has been sent to <b>{email}</b>. This link will expire in {minutes} min.' => 'El correo electrónico con enlace de activación se ha enviado a <b> {email} </b>. Este enlace expirará en {minutes} min.',
			'E-mail' => 'Correo electrónico',
			'Forgot password?' => '¿Has olvidado tu contraseña?',
			'Incorrect username or password' => 'Nombre de usuario o contraseña incorrecta',
			'Login has been taken' => 'Se ha iniciado sesión',
			'Login' => 'Iniciar sesión',
			'Logout' => 'Cerrar sesión',
			'Username' => 'Nombre de usuario',
			'Non Authorized Services' => 'Servicios No Autorizados',
			'Password has been updated' => 'Se ha actualizado la contraseña',
			'Password recovery' => 'Recuperación de contraseña',
			'Password reset for' => 'Restablecer contraseña para',
			'Password' => 'Contraseña',
			'Registration - confirm your e-mail' => 'Registro - confirme su correo electrónico',
			'Registration' => 'Registro',
			'Remember me' => 'Mantener la sesión iniciada',
			'Remove profile picture' => 'Eliminar foto de perfil',
			'Repeat password' => 'Repetir contraseña',
			'Reset Password' => 'Restablecer Contraseña',
			'Reset' => 'Restablecer',
			'Save Profile' => 'Guardar Perfil',
			'Save profile picture' => 'Guardar foto de perfil',
			'Set Password' => 'Establecer Contraseña',
			'Set Username' => 'Establecer nombre de usuario',
			'Signup' => 'Regístrate',
			'This E-mail already exists' => 'Este correo electrónico ya existe',
			'Token not found. It may be expired' => 'Token no encontrado. Puede haber expirado',
			'Token not found. It may be expired. Try reset password once more' => 'Token no encontrado. Puede haber expirado. Intente restablecer la contraseña una vez más',
			'Too many attempts' => 'Demasiados intentos',
			'Unable to send message for email provided' => 'No se ha podido enviar el mensaje al correo electrónico proporcionado',
			'Update Password' => 'Actualizar contraseña',
			'User Profile' => 'Perfil del usuario',
			"User with the same email as in {client} account already exists but isn't linked to it. Login using email first to link it." => "Ya se ha registrado el usuario {client} con el mismo correo electrónico, la cuenta ya existe pero no ha sido vinculada. Inicie sesión con el correo electrónico antes de vincularlo.",
			'The username should contain only Latin letters, numbers and the following characters: "-" and "_".' => 'El nombre de usuario debe contener solo letras, números y los siguientes caracteres: "-" y "_".',
			'Username contains not allowed characters or words.' => 'El nombre de usuario contiene caracteres o palabras no permitidas.',
			'Wrong password' => 'Contraseña incorrecta',
			'You could not login from this IP' => 'No se pudo iniciar sesión desde esta IP',
			'You have not login yet' => 'No has iniciado sesión todavía',
		];
	}
}
