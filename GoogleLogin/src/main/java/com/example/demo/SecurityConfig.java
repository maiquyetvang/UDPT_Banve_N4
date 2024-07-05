//package com.example.demo;
//import jakarta.servlet.http.HttpServletResponse;
//import org.springframework.context.annotation.Bean;
//import org.springframework.security.config.annotation.web.builders.HttpSecurity;
//import org.springframework.security.config.annotation.web.configuration.EnableWebSecurity;
//import org.springframework.security.config.annotation.web.configuration.WebSecurityConfigurerAdapter;
//import org.springframework.security.oauth2.client.oidc.userinfo.OidcUserService;
//import org.springframework.security.web.authentication.AuthenticationSuccessHandler;
//import org.springframework.security.web.authentication.SimpleUrlAuthenticationFailureHandler;
//import org.springframework.security.web.authentication.logout.LogoutSuccessHandler;
//
//@EnableWebSecurity
//public class SecurityConfig extends WebSecurityConfigurerAdapter {
//
//    @Override
//    protected void configure(HttpSecurity http) throws Exception {
//        http
//                .authorizeRequests()
//                .antMatchers("/", "/login**", "/error**").permitAll()
//                .anyRequest().authenticated()
//                .and()
//                .oauth2Login()
//                .successHandler(authenticationSuccessHandler())
//                .failureHandler(new SimpleUrlAuthenticationFailureHandler());
//    }
//
//    @Bean
//    public AuthenticationSuccessHandler authenticationSuccessHandler() {
//        return (request, response, authentication) -> {
//            response.setStatus(HttpServletResponse.SC_OK);
//            response.setContentType("application/json");
//            response.setCharacterEncoding("UTF-8");
//            response.getWriter().write("{\"status\":\"success\",\"user\":\"" + authentication.getName() + "\"}");
//        };
//    }
//
//    @Bean
//    public LogoutSuccessHandler logoutSuccessHandler() {
//        return (request, response, authentication) -> {
//            response.setStatus(HttpServletResponse.SC_OK);
//            response.setContentType("application/json");
//            response.setCharacterEncoding("UTF-8");
//            response.getWriter().write("{\"status\":\"success\",\"message\":\"logged out\"}");
//        };
//    }
//}
