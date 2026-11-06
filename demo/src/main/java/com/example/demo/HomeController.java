package com.example.demo;

import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.GetMapping;

@Controller
public class HomeController {

	@GetMapping("/")
	public String index(Model model) {
		model.addAttribute("mensaje", "El servidor Spring Boot funciona correctamente");
		return "index";
	}

	@GetMapping("/privado")
	public String privado() {
		return "privado";
	}
}
