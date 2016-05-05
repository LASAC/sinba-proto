package controllers;

import com.google.inject.Inject;
import play.data.*;
import play.mvc.*;
import play.Logger;
import play.libs.Json;

import views.html.*;

import models.*;

/**
 * This controller contains an action to handle HTTP requests
 * to the application's home page.
 */
public class HomeController extends Controller {
    private static Logger.ALogger logger = Logger.of(HomeController.class);

    @Inject
    FormFactory formFactory;

    /**
     * An action that renders an HTML page with a welcome message.
     * The configuration in the <code>routes</code> file means that
     * this method will be called when the application receives a
     * <code>GET</code> request with a path of <code>/</code>.
     */
    public Result index() {
        return ok(index.render("SINBA - Sistema de Informações de Bacias Hidrográficas", "", "", ""));
    }

    public Result login() {
        DynamicForm userForm = formFactory.form().bindFromRequest();
        System.out.println("form: " + Json.toJson(userForm).toString());

        String email = userForm.get("email");
        String password = userForm.get("password");

        System.out.println("credenciais: [email=" + email + ";password=" + password + "]");

        if(User.authenticate(email, password)) {

            return redirect(routes.HomeController.home());
        }

        return redirect(routes.HomeController.accessDenied());
        
    }

    public Result home() {
        return ok(home.render("SINBA - Página Inicial"));
    }

    public Result accessDenied() {
        return ok(
            index.render(
                "SINBA - Sistema de Informações de Bacias Hidrográficas", 
                "Autenticação:", "Acesso negado!", "warning"
            )
        );
    }

}
