package dev.psbios.CadastroDeNinjas.Ninjas;

import dev.psbios.CadastroDeNinjas.Missoes.MissaoModel;
import jakarta.persistence.*;
import lombok.AllArgsConstructor;
import lombok.Data;
import lombok.NoArgsConstructor;

import java.util.List;

// @Entity transforma uma classe em uma entidade
// JPA = Java Persistence API
@Entity
@Table(name = "tb_cadastro")

// Anotações do lombok, cria os contrutores, mas eles não são exibidos
@NoArgsConstructor
@AllArgsConstructor

// lombok - @Data -  Cria os getters e setters.
@Data
public class NinjaModel {

    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    private Long id;
    private String nome;
    private String email;
    private int idade;

    // @ManyToOne = Um ninja só pode ter uma única missão.
    @ManyToOne
    @JoinColumn(name = "missoes_id") // Foreign key (chave estrangeira)
    private MissaoModel missoes;
}