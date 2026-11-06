package com.example.demo;

import org.springframework.context.annotation.Bean;
import org.springframework.context.annotation.Configuration;
import org.springframework.security.config.Customizer;
import org.springframework.security.config.annotation.web.builders.HttpSecurity;
import org.springframework.security.web.SecurityFilterChain;

@Configuration
public class SecurityConfig {

	@Bean
	SecurityFilterChain securityFilterChain(HttpSecurity http) throws Exception {
		http
			.authorizeHttpRequests(auth -> auth
				.requestMatchers("/", "/h2-console/**", "/css/**", "/js/**").permitAll()
				.anyRequest().authenticated())
			.formLogin(Customizer.withDefaults())
			.logout(Customizer.withDefaults())
			// La consola H2 usa frames y formularios sin token CSRF
			.csrf(csrf -> csrf.ignoringRequestMatchers("/h2-console/**"))
			.headers(headers -> headers.frameOptions(frame -> frame.sameOrigin()));
		return http.build();
	}
}
