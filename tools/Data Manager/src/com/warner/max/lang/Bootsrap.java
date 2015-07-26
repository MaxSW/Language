package com.warner.max.lang;

public class Bootsrap {

	public static void main(String[] args) {
		DataManager data = new DataManager("C:/Users/Max/Desktop/data.csv");
		data.load();
		System.out.println(data.generateJSON());
	}
}
