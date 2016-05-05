package controllers;

import com.google.inject.Inject;
import java.util.List;
import javax.persistence.PersistenceException;
import play.data.*;
import play.libs.Json;
import play.Logger;
import play.mvc.*;

import views.html.index;
import views.html.user.*;

import models.*;

/**
 * This controller contains an action to handle HTTP requests
 * to the application's home page.
 */
public class UserController extends Controller {
	private static Logger.ALogger logger = Logger.of(UserController.class);

	@Inject
	FormFactory formFactory;

	public Result register() {
		if(!User.authenticated()) {
			return redirect(routes.HomeController.accessDenied());
		}

		Form<User> userForm = formFactory.form(User.class);
		return ok(register.render(userForm));
	}

	public Result save() {
		if(!User.authenticated()) {
			return redirect(routes.HomeController.accessDenied());
		}
		
		Form<User> userForm = formFactory.form(User.class).bindFromRequest();
		
		if(userForm.hasErrors()) {
			System.out.println("Erro ao cadastrar usuário");
			return badRequest(register.render(formFactory.form(User.class)));
		}
		
		User user = userForm.get();

		System.out.println(Json.toJson(user).toString());
		try
		{
			user.save();
		}
		catch(PersistenceException e) {
			System.out.println("E-mail já cadastrado");
			return badRequest(register.render(formFactory.form(User.class)));
		}
		System.out.println("Usuário cadastrado com sucesso");

		String strong = "Parabéns!";
		String message = "Sua solicitação de cadastro foi realizada" +
		"com sucesso. Aguarde confirmação do Administrador do Sistema.";

		return ok(index.render("SINBA - Novo usuário", strong, message, "success"));
	}

	public Result manage() {
		if(!User.authenticated()) {
			return redirect(routes.HomeController.accessDenied());
		}
		

		List<User> userList = User.findAll();
		Form<UserPermission> permissionForm = formFactory.form(UserPermission.class);
		return ok(manage.render("Permissões", userList, permissionForm));
	}

	public Result deny(Long id) {
		if(!User.authenticated()) {
			return redirect(routes.HomeController.accessDenied());
		}
		

		User user = User.retrieve(id);
		if(user == null) {
			return notFound(id + " não consta no banco de dados.");
		}
		user.delete();
		return redirect( routes.UserController.manage() );
	}

	public Result updatePermission() {
		if(!User.authenticated()) {
			return redirect(routes.HomeController.accessDenied());
		}
		
		Form<UserPermission> permissionForm = formFactory.form(UserPermission.class).bindFromRequest();

		UserPermission permission = permissionForm.get();
		User user = User.retrieve(permission.userId);
		if(user == null) {
			return notFound(permission.userId + " não consta no banco de dados.");
		}

		user.permission = Permission.getById(permission.id);
		user.update();

		return redirect( routes.UserController.manage() );
	}

}
