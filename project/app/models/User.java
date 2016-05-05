package models;

import com.avaje.ebean.Model;
import java.util.ArrayList;
import java.util.List;
import javax.persistence.Column;
import javax.persistence.Entity;
import javax.persistence.Id;
import play.data.validation.Constraints;
import play.data.validation.ValidationError;
import play.mvc.Http;
import play.mvc.Http.Session;

@Entity
public class User extends Model {
	@Id
	public Long id;

	@Constraints.Required
	@Column(unique=true, nullable=false)
	public String email;
	
	public String password;
	
	@Constraints.Required
	public String name;
	
	@Constraints.Required
	public String lastName;
	
	@Constraints.Required
	public String justification;

	public Permission permission;

	private static Finder<Long, User> find = new Finder<Long, User>(User.class);

	public static List<User> findAll() {
		return find.orderBy("name").findList();
	}

	public static User retrieve(Long id) {
		return find.byId(id);
	}

	public static boolean authenticate(String email, String password) {
        Session session = Http.Context.current().session();
		if( email != null && password != null && email.equals("admin") && password.equals("admin")) {
            session.put("connected", email);
			return true;
		}
		session.remove("connected");
		return false;
	}

	public static boolean authenticated() {
        Session session = Http.Context.current().session();
        String connected = session.get("connected");
		return connected != null && !connected.isEmpty();
	}
}