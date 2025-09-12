package dev.psbios.CadastroDeNinjas.Missoes;

import dev.psbios.CadastroDeNinjas.Ninjas.NinjaModel;
import jakarta.persistence.*;
import lombok.AllArgsConstructor;
import lombok.Data;
import lombok.NoArgsConstructor;

import java.util.List;

@Entity
@Table(name = "tb_missao")

// Anotações do lombok, cria os contrutores, mas eles não são exibidos
@NoArgsConstructor
@AllArgsConstructor

// lombok - @Data -  Cria os getters e setters.
@Data
public class MissaoModel {

    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    private Long id;
    private String nome;
    private String dificuldade;

    // @OneToMany = Uma missão pode ser executada por vários ninjas.
    @OneToMany(mappedBy = "missoes")
    private List<NinjaModel> ninja;
    
}
