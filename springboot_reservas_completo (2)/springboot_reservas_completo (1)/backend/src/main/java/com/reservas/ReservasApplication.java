package com.reservas;

import org.springframework.boot.SpringApplication;
import org.springframework.boot.autoconfigure.SpringBootApplication;

@SpringBootApplication
public class ReservasApplication {
    public static void main(String[] args) {
        SpringApplication.run(ReservasApplication.class, args);
        @Entity
public class Reserva {
    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    private Long id;

    private String espacio;
    private String fecha; // puedes usar LocalDate si prefieres
    private String hora;
    private String usuario;

    // Getters y setters
}
public interface ReservaRepository extends JpaRepository<Reserva, Long> {
    List<Reserva> findByFecha(String fecha);
}
@RestController
@RequestMapping("/api/reservas")
@CrossOrigin(origins = "*")
public class ReservaController {

    @Autowired
    private ReservaRepository reservaRepo;

    @PostMapping
    public Reserva crearReserva(@RequestBody Reserva reserva) {
        return reservaRepo.save(reserva);
    }

    @GetMapping
    public List<Reserva> obtenerTodas() {
        return reservaRepo.findAll();
    }
}

    }
}