package com.springtest.springtest;

import org.springframework.boot.SpringApplication;
import org.springframework.boot.autoconfigure.SpringBootApplication;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.RequestParam;
import org.springframework.web.bind.annotation.RestController;

@SpringBootApplication
@RestController 
public class SpringtestApplication {

	public static void main(String[] args) {
		SpringApplication.run(SpringtestApplication.class, args);
	}

	@GetMapping("/somar")
    public double somar(@RequestParam(value = "valor1", defaultValue = "World") double valor1, 
							@RequestParam(value = "valor2", defaultValue = "World") double valor2) {
	var resultado = valor1 + valor2;
      return resultado;
	}
	@GetMapping("/subtrair")
    public double subtrair(@RequestParam(value = "valor1", defaultValue = "0") double valor1, 
							@RequestParam(value = "valor2", defaultValue = "0") double valor2) {
	var resultado = valor1 - valor2;
      return resultado;
	}
	@GetMapping("/multiplicar")
    public double multiplicar(@RequestParam(value = "valor1", defaultValue = "0") double valor1, 
							@RequestParam(value = "valor2", defaultValue = "0") double valor2) {
	var resultado = valor1 * valor2;
      return resultado;
	}
	@GetMapping("/dividir")
    public double dividir(@RequestParam(value = "valor1", defaultValue = "World") double valor1, 
							@RequestParam(value = "valor2", defaultValue = "World") double valor2) {

	if (valor2==0) {
		return 0;
	}else{
	var resultado = valor1 / valor2;
      return resultado;
	}	
	}
	

}
