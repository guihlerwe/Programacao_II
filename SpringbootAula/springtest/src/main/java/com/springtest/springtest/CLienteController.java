package com.springtest.springtest;

import java.util.ArrayList;
import java.util.List;

import org.springframework.web.bind.annotation.RestController;
import org.apache.catalina.connector.Response;
import org.springframework.http.ResponseEntity;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.RequestParam;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.RequestBody;



@RestController
public class CLienteController {
    private List<Cliente> clientes = new ArrayList<Cliente>();

    @GetMapping("/clientes")
    public List<Cliente> all() {
        return clientes;
    }

    @PostMapping("/clientes")
    public ResponseEntity<Cliente> addCliente(@RequestBody Cliente cliente) {
        clientes.add(cliente);

        return ResponseEntity.ok(cliente);
    }
    
    
}
