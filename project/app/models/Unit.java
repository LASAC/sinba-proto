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
public class Unit extends Model {
	@Id
	public Long id;

	@Constraints.Required
	@Column(unique=true, nullable=false)
	public String name;

	@Constraints.Required
	@Column(unique=true, nullable=false)
	public String symbol;

	private static Finder<Long, Unit> find = new Finder<Long, Unit>(Unit.class);

	public static List<Unit> findAll() {
		return find.orderBy("name").findList();
	}

	public static Unit retrieve(Long id) {
		return find.byId(id);
	}
}