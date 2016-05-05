package models;

public enum Permission {
	READER(0),
	CONTRIBUTOR(1),
	PARAMETER_ADMIN(2),
	ADMIN(3);

	private final int id;
	private Permission(int id) {
		this.id = id;
	}

	public int getId() {
		return id;
	}

	public static Permission getById(int id) {
		switch (id) {
			case 0: return READER;
			case 1: return CONTRIBUTOR;
			case 2: return PARAMETER_ADMIN;
			case 3: return ADMIN;
			default: return null;
		}
	}

	@Override
	public String toString() {
		switch(this) {
			case READER: return "Leitor";
			case CONTRIBUTOR: return "Contribuidor";
			case PARAMETER_ADMIN: return "Administrador Intermediário";
			case ADMIN: return "Administrador";
		}
		return null;
	}
}