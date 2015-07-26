package com.warner.max.lang;

import java.io.BufferedReader;
import java.io.FileReader;
import java.util.ArrayList;
import java.util.List;

public class DataManager {

	public String sourceFile;
	public ArrayList<Language> languages;

	public DataManager(String sourceFile) {
		this.sourceFile = sourceFile;
	}

	public void load() {
		languages = new ArrayList<Language>();
		String[] lines = readFile(sourceFile);
		for (int i = 0; i < lines.length; i++) {
			String line = lines[i];
			if (!line.contains("\"")) {
				// A single country language with no "
				String[] split = line.split(",");
				Language l = new Language();
				l.code = split[0];
				l.rank = split[1];
				l.name = split[2];
				l.nat = split[3];
				l.tot = split[4];
				String[] countries = { split[5] };
				l.countries = countries;
				languages.add(l);
			} else {
				String[] split = line.split(",");
				Language l = new Language();
				l.code = split[0];
				l.rank = split[1];
				l.name = split[2];
				l.nat = split[3];
				l.tot = split[4];

				String[] countries = new String[split.length - 5];
				for (int j = 0; j < split.length; j++) {
					if (j > 4) {
						String c = split[j];
						if (!c.contains("\"")) {
							c.trim();
							countries[j - 5] = c;
						} else {
							c = c.replaceAll("\\s+", "").replaceAll("\"", "");
							countries[j - 5] = c;
						}
					}
				}
				l.countries = countries;
				languages.add(l);
			}
		}
		System.out.println("Loaded " + languages.size() + " languages");
		Language english = languages.get(1);
		for (int k = 0; k < english.countries.length; k++) {
			System.out.println(english.countries[k]);
		}
	}

	public String generateJSON() {
		StringBuilder s = new StringBuilder();
		s.append("data = {");

		for (Language l : languages) {
			s.append("\"" + l.code + "\":{");
			s.append("\"name\":\"" + l.name + "\",");
			s.append("\"nat\":\"" + l.nat + "\",");
			s.append("\"tot\":\"" + l.tot + "\",");
			s.append("\"rank\":\"" + l.rank + "\",");
			s.append("\"countries\":{");
			for (int i = 0; i < l.countries.length; i++) {
				l.countries[i] = l.countries[i].toUpperCase();
				if (i != l.countries.length - 1)
					s.append("\"" + l.countries[i] + "\":1,");
				else
					s.append("\"" + l.countries[i] + "\":1");
			}
			s.append("}");
			if (languages.indexOf(l) != languages.size() - 1)
				s.append("},");
			else
				s.append("}");

		}

		s.append("};");
		return s.toString();
	}

	public String[] readFile(String filename) {
		try {
			FileReader fileReader = new FileReader(filename);
			BufferedReader bufferedReader = new BufferedReader(fileReader);
			List<String> lines = new ArrayList<String>();
			String line = null;
			while ((line = bufferedReader.readLine()) != null) {
				lines.add(line);
			}
			bufferedReader.close();
			return lines.toArray(new String[lines.size()]);
		} catch (Exception e) {
			e.printStackTrace();
			return null;
		}
	}

}
