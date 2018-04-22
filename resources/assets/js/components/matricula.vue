<template>
    <div>
        <template>
            <form-wizard title="Matricula de Aluno" subtitle="Criação de matrícula completa de alunos"
                         nextButtonText="Próximo" backButtonText="Voltar" finishButtonText="Criar matrícula"
                         color="#3c8cbc" errorColor="#f90000" @on-complete="storeMatricula">
                <tab-content title="Aluno" icon="ti-ruler-pencil" :before-change="validateStepAluno">
                    <boxDefault title="Dados do Aluno" :stateBox="formStateBox.boxAluno">
                        <form @submit.prevent="validateStepAluno" data-vv-scope="step1">

                            <div class="col-lg-6">
                                <picture-input width="150" height="150" radius="10" accept="image/jpeg,image/png"
                                               @change="onChange"
                                               prefill="/uploads/avatarPadrao.jpg"
                                               :hideChangeButton="true"
                                               buttonClass="btn btn-primary"
                                               :customStrings="{
                                            drag: 'Foto do Aluno'
                                          }">
                                </picture-input>
                            </div>

                            <div class="col-lg-6">
                                <div :class="{'form-group':true,  'has-error': errors.has('step1.nome_aluno')}">
                                    <label class="control-label" for="nome_aluno">
                                        <i v-show="errors.has('step1.nome_aluno')" class="fa fa-times-circle-o"></i>
                                        Campo obrigatório
                                    </label>
                                    <input name="nome_aluno" v-model="matricula.nome_aluno" type="text"
                                           class="form-control"
                                           id="nome_aluno" placeholder="Nome completo"
                                           v-validate="'required|alpha_spaces'">
                                    <span class="help-block" v-show="errors.has('step1.nome_aluno')">O campo Nome do Aluno é obrigatório</span>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div :class="{'form-group':true,  'has-error': errors.has('step1.rg_aluno')}">
                                    <label class="control-label" for="rg_aluno">
                                        <i v-show="errors.has('step1.rgAluno')" class="fa fa-times-circle-o"></i>
                                        RG
                                    </label>
                                    <input name="rg_aluno" v-model="matricula.rg_aluno" type="text" class="form-control"
                                           id="rg_aluno" placeholder="__.___.___-__"
                                           v-mask="'##.###.###-NN'"
                                           v-validate="'required'">
                                    <span class="help-block"
                                          v-show="errors.has('step1.rg_aluno')">O campo RG é obrigatório</span>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div :class="{'form-group':true,  'has-error': errors.has('step1.data_nascimento_aluno')}">
                                    <label class="control-label" for="data_nascimento_aluno">
                                        <i v-show="errors.has('step1.data_nascimento_aluno')"
                                           class="fa fa-times-circle-o"></i>
                                        Data de nascimento
                                    </label>
                                    <input name="data_nascimento_aluno" v-model="matricula.data_nascimento_aluno"
                                           type="text"
                                           class="form-control"
                                           id="data_nascimento_aluno" placeholder="__/__/____"
                                           v-mask="'##/##/####'"
                                           v-validate="'required|date_format:DD/MM/YYYY'">
                                    <span class="help-block"
                                          v-show="errors.has('step1.data_nascimento_aluno')">{{ errors.first('step1.data_nascimento_aluno') }}</span>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div :class="{'form-group':true,  'has-error': errors.has('step1.sexo_aluno')}">
                                    <label class="control-label" for="sexo_aluno">
                                        <i v-show="errors.has('step1.sexo_aluno')" class="fa fa-times-circle-o"></i>
                                        Sexo
                                    </label>
                                    <select name="sexo_aluno" v-model="matricula.sexo_aluno" class="form-control"
                                            id="sexo_aluno"
                                            v-validate="'required|in:1,2,3'">
                                        <option value="1">Feminino</option>
                                        <option value="2">Masculino</option>
                                        <option value="3">Outros</option>
                                    </select>

                                    <span class="help-block"
                                          v-show="errors.has('step1.sexoAuno')">{{ errors.first('step1.sexo_aluno') }}</span>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div :class="{'form-group':true,  'has-error': errors.has('step1.emailAluno')}">
                                    <label class="control-label" for="emailAluno">
                                        <i v-show="errors.has('step1.emailAluno')" class="fa fa-times-circle-o"></i>
                                        Email
                                    </label>
                                    <input name="emailAluno" v-model="matricula.emailAluno" type="text"
                                           class="form-control"
                                           id="emailAluno" placeholder="email@email.com.br"
                                           v-validate="'required|email'">
                                    <span class="help-block"
                                          v-show="errors.has('step1.emailAluno')">O campo Email é obrigatório</span>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div :class="{'form-group':true,  'has-error': errors.has('step1.telefoneAluno')}">
                                    <label class="control-label" for="telefoneAluno">
                                        <i v-show="errors.has('step1.telefoneAluno')" class="fa fa-times-circle-o"></i>
                                        Telefone
                                    </label>
                                    <input name="telefoneAluno" v-model="matricula.telefoneAluno" type="text"
                                           class="form-control"
                                           id="telefoneAluno" placeholder="(00) 0 0000-0000"
                                           v-mask="'(##) # ####-####'"
                                           v-validate="'required|min:15'">
                                    <span class="help-block"
                                          v-show="errors.has('step1.telefoneAluno')">O campo Telefone é obrigatório</span>
                                </div>
                            </div>

                            <div class="form-group col-sm-12">
                                <div class="col-sm-3 -align-right">
                                    <label for="flg_certidao_nascimento_aluno">
                                        Apresentou certidão de nascimento:
                                    </label>
                                </div>
                                <div class="col-sm-3 -align-left" id="flg_certidao_nascimento_aluno">
                                    <label class="checkbox-inline">
                                        <input type="radio" id="flg_certidao_nascimento_alunoSim" value="1"
                                               v-model="matricula.flg_certidao_nascimento_aluno">
                                        <label for="flg_certidao_nascimento_alunoSim">Sim</label>
                                    </label>
                                    <label class="checkbox-inline">
                                        <input type="radio" id="flg_certidao_nascimento_alunoNao" value="0"
                                               v-model="matricula.flg_certidao_nascimento_aluno">
                                        <label for="flg_certidao_nascimento_alunoNao">Não</label>
                                    </label>
                                </div>
                            </div>


                            <div class="form-group col-sm-12">
                                <div class="col-sm-3 -align-right">
                                    <label for="flg_carteira_vacinacao_aluno">
                                        Apresentou carteira de vacinação:
                                    </label>
                                </div>
                                <div class="col-sm-3 -align-left" id="flg_carteira_vacinacao_aluno">
                                    <label class="checkbox-inline">
                                        <input type="radio" id="flg_carteira_vacinacao_alunoSim" value="1"
                                               v-model="matricula.flg_carteira_vacinacao_aluno">
                                        <label for="flg_carteira_vacinacao_alunoSim">Sim</label>
                                    </label>
                                    <label class="checkbox-inline">
                                        <input type="radio" id="flg_carteira_vacinacao_alunoNao" value="0"
                                               v-model="matricula.flg_carteira_vacinacao_aluno">
                                        <label for="flg_carteira_vacinacao_alunoNao">Não</label>
                                    </label>
                                </div>
                            </div>

                            <div class="form-group col-sm-12">
                                <div class="col-sm-3 -align-right">
                                    <label for="flg_frequentou_escola_aluno">
                                        Frequentou outra escola:
                                    </label>
                                </div>
                                <div class="col-sm-3 -align-left" id="flg_frequentou_escola_aluno">
                                    <label class="checkbox-inline">
                                        <input type="radio" id="flg_frequentou_escola_alunoSim" value="1"
                                               v-model="matricula.flg_frequentou_escola_aluno">
                                        <label for="flg_frequentou_escola_alunoSim">Sim</label>
                                    </label>
                                    <label class="checkbox-inline">
                                        <input type="radio" id="flg_frequentou_escola_alunoNao" value="0"
                                               v-model="matricula.flg_frequentou_escola_aluno">
                                        <label for="flg_frequentou_escola_alunoNao">Não</label>
                                    </label>
                                </div>
                            </div>

                            <div class="form-group col-sm-12">
                                <div class="col-sm-3 -align-right">
                                    <label for="flg_irmaos_aluno">
                                        Possui irmãos:
                                    </label>
                                </div>
                                <div class="col-sm-3 -align-left" id="flg_irmaos_aluno">
                                    <label class="checkbox-inline">
                                        <input type="radio" id="flg_irmaos_alunoSim" value="1"
                                               v-model="matricula.flg_irmaos_aluno">
                                        <label for="flg_irmaos_alunoSim">Sim</label>
                                    </label>
                                    <label class="checkbox-inline">
                                        <input type="radio" id="flg_irmaos_alunoNao" value="0"
                                               v-model="matricula.flg_irmaos_aluno">
                                        <label for="flg_irmaos_alunoNao">Não</label>
                                    </label>
                                </div>
                            </div>

                            <div class="form-group col-sm-12" v-show="choseVisible(matricula.flg_irmaos_aluno)">
                                <div class="col-sm-3 -align-right">
                                    <label for="qtd_irmaos_aluno">
                                        Quantos irmãos?
                                    </label>
                                </div>
                                <div class="col-sm-3 -align-left">
                                    <div :class="{'form-group':true,  'has-error': errors.has('qtd_irmaos_aluno')}">
                                        <input name="qtd_irmaos_aluno" v-model="matricula.qtd_irmaos_aluno" type="text"
                                               class="form-control"
                                               v-validate="'min:1|max:10|decimal:1,2,3,4,5,6,7,8,9 '"
                                               id="qtd_irmaos_aluno">
                                        <span class="help-block"
                                              v-show="errors.has('qtd_irmaos_aluno')">Valor inválido</span>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group col-sm-12">
                                <div class="col-sm-3 -align-right">
                                    <label for="flg_juntos_aos_pais_alunoSim">
                                        Mora junto aos pais:
                                    </label>
                                </div>
                                <div class="col-sm-3 -align-left" id="flg_juntos_aos_pais_aluno">
                                    <label class="checkbox-inline">
                                        <input type="radio" id="flg_juntos_aos_pais_alunoSim" value="1"
                                               v-model="matricula.flg_juntos_aos_pais_aluno">
                                        <label for="flg_juntos_aos_pais_alunoSim">Sim</label>
                                    </label>
                                    <label class="checkbox-inline">
                                        <input type="radio" id="flg_juntos_aos_pais_alunoNao" value="0"
                                               v-model="matricula.flg_juntos_aos_pais_aluno">
                                        <label for="flg_juntos_aos_pais_alunoNao">Não</label>
                                    </label>
                                </div>
                            </div>
                        </form>
                    </boxDefault>
                </tab-content>
                <tab-content title="Responsável" icon="ti-ruler" :before-change="validateStepResponsaveis">
                    <boxDefault title="Dados dos Responsáveis" :stateBox="formStateBox.boxResponsavel">
                        <div class="col-lg-6">
                            <div :class="{'form-group':true,  'has-error': formStateBox.responsavel1Erro}">
                                <label class="control-label" for="responsavel-n-1">
                                    <i v-show="errors.has('responsavel-n-1')"
                                       class="fa fa-times-circle-o"></i>
                                    Responsável 1
                                </label>
                                <v-select v-validate="'required'" id="responsavel-n-1" label="nome"
                                          :filterable="false"
                                          name="responsavel-n-1"
                                          :options="options"
                                          @search="onSearch"
                                          v-model="matricula.responsavel1">
                                    <span slot="no-options"> Pesquise um usuário. </span>
                                </v-select>
                                <span class="help-block"
                                      v-show="errors.has('responsavel-n-1') || formStateBox.responsavel1Erro">O campo Responsável1 é obrigatório</span>

                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div :class="{'form-group':true,  'has-error': errors.has('responsavel-n-2')}">
                                <label class="control-label" for="responsavel-n-2">
                                    <i v-show="errors.has('responsavel-n-2')"
                                       class="fa fa-times-circle-o"></i>
                                    Responsável 2
                                </label>
                                <v-select id="responsavel-n-2" label="nome" :filterable="false" :options="options"
                                          name="responsavel2"
                                          @search="onSearch"
                                          v-model="matricula.responsavel2">
                                    <span slot="no-options"> Pesquise um usuário. </span>

                                </v-select>
                                <span class="help-block" v-show="errors.has('responsavel-n-2')">O campo Responsável é obrigatório</span>
                            </div>
                        </div>
                    </boxDefault>
                </tab-content>
                <tab-content title="Médico" icon="ti-support">
                    <boxDefault title="Dados médicos" :stateBox="formStateBox.boxMedico">

                        <div class="form-group col-sm-12">
                            <div class="col-sm-3 -align-right">
                                <label for="boxMedicoSarampo">
                                    Sarampo:
                                </label>
                            </div>
                            <div class="col-sm-3 -align-left" id="boxMedicoSarampo">
                                <label class="checkbox-inline">
                                    <input type="radio" id="boxMedicoSarampoSim" value="1"
                                           v-model="matricula.boxMedico.sarampo">
                                    <label for="boxMedicoSarampoSim">Sim</label>
                                </label>
                                <label class="checkbox-inline">
                                    <input type="radio" id="boxMedicoSarampoNao" value="0"
                                           v-model="matricula.boxMedico.sarampo">
                                    <label for="boxMedicoSarampoNao">Não</label>
                                </label>
                            </div>
                        </div>

                        <div class="form-group col-sm-12">
                            <div class="col-sm-3 -align-right">
                                <label for="boxMedicoRubeola">
                                    Rubeola:
                                </label>
                            </div>
                            <div class="col-sm-3 -align-left" id="boxMedicoRubeola">
                                <label class="checkbox-inline">
                                    <input type="radio" id="boxMedicoRubeolaSim" value="1"
                                           v-model="matricula.boxMedico.rubeola">
                                    <label for="boxMedicoRubeolaSim">Sim</label>
                                </label>
                                <label class="checkbox-inline">
                                    <input type="radio" id="boxMedicoRubeolaNao" value="0"
                                           v-model="matricula.boxMedico.rubeola">
                                    <label for="boxMedicoRubeolaNao">Não</label>
                                </label>
                            </div>
                        </div>

                        <div class="form-group col-sm-12">
                            <div class="col-sm-3 -align-right">
                                <label for="boxMedicoCatapora">
                                    Catapora:
                                </label>
                            </div>
                            <div class="col-sm-3 -align-left" id="boxMedicoCatapora">
                                <label class="checkbox-inline">
                                    <input type="radio" id="boxMedicoCataporaSim" value="1"
                                           v-model="matricula.boxMedico.catapora">
                                    <label for="boxMedicoCataporaSim">Sim</label>
                                </label>
                                <label class="checkbox-inline">
                                    <input type="radio" id="boxMedicoCataporaNao" value="0"
                                           v-model="matricula.boxMedico.catapora">
                                    <label for="boxMedicoCataporaNao">Não</label>
                                </label>
                            </div>
                        </div>

                        <div class="form-group col-sm-12">
                            <div class="col-sm-3 -align-right">
                                <label for="boxMedicoEscarlatina">
                                    Escarlatina:
                                </label>
                            </div>
                            <div class="col-sm-3 -align-left" id="boxMedicoEscarlatina">
                                <label class="checkbox-inline">
                                    <input type="radio" id="boxMedicoEscarlatinaSim" value="1"
                                           v-model="matricula.boxMedico.escarlatina">
                                    <label for="boxMedicoEscarlatinaSim">Sim</label>
                                </label>
                                <label class="checkbox-inline">
                                    <input type="radio" id="boxMedicoEscarlatinaNao" value="0"
                                           v-model="matricula.boxMedico.escarlatina">
                                    <label for="boxMedicoEscarlatinaNao">Não</label>
                                </label>
                            </div>
                        </div>

                        <div class="form-group col-sm-12">
                            <div class="col-sm-3 -align-right">
                                <label for="boxMedicoBronquite">
                                    Bronquite:
                                </label>
                            </div>
                            <div class="col-sm-3 -align-left" id="boxMedicoBronquite">
                                <label class="checkbox-inline">
                                    <input type="radio" id="boxMedicoBronquiteSim" value="1"
                                           v-model="matricula.boxMedico.bronquite">
                                    <label for="boxMedicoBronquiteSim">Sim</label>
                                </label>
                                <label class="checkbox-inline">
                                    <input type="radio" id="boxMedicoBronquiteNao" value="0"
                                           v-model="matricula.boxMedico.bronquite">
                                    <label for="boxMedicoBronquiteNao">Não</label>
                                </label>
                            </div>
                        </div>


                        <div class="form-group col-sm-12">
                            <div class="col-sm-3 -align-right">
                                <label for="boxMedicoFaltadear">
                                    Falta de ar:
                                </label>
                            </div>
                            <div class="col-sm-3 -align-left" id="boxMedicoFaltadear">
                                <label class="checkbox-inline">
                                    <input type="radio" id="boxMedicoFaltadearSim" value="1"
                                           v-model="matricula.boxMedico.faltadear">
                                    <label for="boxMedicoFaltadearSim">Sim</label>
                                </label>
                                <label class="checkbox-inline">
                                    <input type="radio" id="boxMedicoFaltadearNao" value="0"
                                           v-model="matricula.boxMedico.faltadear">
                                    <label for="boxMedicoFaltadearNao">Não</label>
                                </label>
                            </div>
                        </div>

                        <div class="form-group col-sm-12">
                            <div class="col-sm-3 -align-right">
                                <label for="boxMedicoDiabete">
                                    Diabetes:
                                </label>
                            </div>
                            <div class="col-sm-3 -align-left" id="boxMedicoDiabete">
                                <label class="checkbox-inline">
                                    <input type="radio" id="boxMedicoDiabeteSim" value="1"
                                           v-model="matricula.boxMedico.diabetes">
                                    <label for="boxMedicoDiabeteSim">Sim</label>
                                </label>
                                <label class="checkbox-inline">
                                    <input type="radio" id="boxMedicoDiabeteNao" value="0"
                                           v-model="matricula.boxMedico.diabetes">
                                    <label for="boxMedicoDiabeteNao">Não</label>
                                </label>
                            </div>
                        </div>

                        <div class="form-group col-sm-12">
                            <div class="col-sm-3 -align-right">
                                <label for="boxMedicoRefluxo">
                                    Refluxo:
                                </label>
                            </div>
                            <div class="col-sm-3 -align-left" id="boxMedicoRefluxo">
                                <label class="checkbox-inline">
                                    <input type="radio" id="boxMedicoRefluxoSim" value="1"
                                           v-model="matricula.boxMedico.refluxo">
                                    <label for="boxMedicoRefluxoSim">Sim</label>
                                </label>
                                <label class="checkbox-inline">
                                    <input type="radio" id="boxMedicoRefluxoNao" value="0"
                                           v-model="matricula.boxMedico.refluxo">
                                    <label for="boxMedicoRefluxoNao">Não</label>
                                </label>
                            </div>
                        </div>

                        <div class="form-group col-sm-12">
                            <div class="col-sm-3 -align-right">
                                <label for="boxMedicoConvulsao">
                                    Convulsão:
                                </label>
                            </div>
                            <div class="col-sm-3 -align-left" id="boxMedicoConvulsao">
                                <label class="checkbox-inline">
                                    <input type="radio" id="boxMedicoConvulsaoSim" value="1"
                                           v-model="matricula.boxMedico.convulsao">
                                    <label for="boxMedicoConvulsaoSim">Sim</label>
                                </label>
                                <label class="checkbox-inline">
                                    <input type="radio" id="boxMedicoConvulsaoNao" value="0"
                                           v-model="matricula.boxMedico.convulsao">
                                    <label for="boxMedicoConvulsaoNao">Não</label>
                                </label>
                            </div>
                        </div>

                        <div class="form-group col-sm-12">
                            <div class="col-sm-3 -align-right">
                                <label for="boxMedicoAlergia">
                                    Alergia:
                                </label>
                            </div>
                            <div class="col-sm-3 -align-left" id="boxMedicoAlergia">
                                <label class="checkbox-inline">
                                    <input type="radio" id="boxMedicoAlergiaSim" value="1"
                                           v-model="matricula.boxMedico.alergia">
                                    <label for="boxMedicoAlergiaSim">Sim</label>
                                </label>
                                <label class="checkbox-inline">
                                    <input type="radio" id="boxMedicoAlergiaNao" value="0"
                                           v-model="matricula.boxMedico.alergia">
                                    <label for="boxMedicoAlergiaNao">Não</label>
                                </label>
                            </div>
                        </div>

                        <div class="form-group col-sm-12">
                            <div class="col-sm-3 -align-right">
                                <label for="boxMedicoVisao">
                                    Deficiência visual:
                                </label>
                            </div>
                            <div class="col-sm-3 -align-left" id="boxMedicoVisao">
                                <label class="checkbox-inline">
                                    <input type="radio" id="boxMedicoVisaoSim" value="1"
                                           v-model="matricula.boxMedico.visao">
                                    <label for="boxMedicoVisaoSim">Sim</label>
                                </label>
                                <label class="checkbox-inline">
                                    <input type="radio" id="boxMedicoVisaoNao" value="0"
                                           v-model="matricula.boxMedico.visao">
                                    <label for="boxMedicoVisaoNao">Não</label>
                                </label>
                            </div>
                        </div>

                        <div class="form-group col-sm-12">
                            <div class="col-sm-3 -align-right">
                                <label for="boxMedicoFala">
                                    Deficiência na fala:
                                </label>
                            </div>
                            <div class="col-sm-3 -align-left" id="boxMedicoFala">
                                <label class="checkbox-inline">
                                    <input type="radio" id="boxMedicoFalaSim" value="1"
                                           v-model="matricula.boxMedico.fala">
                                    <label for="boxMedicoFalaSim">Sim</label>
                                </label>
                                <label class="checkbox-inline">
                                    <input type="radio" id="boxMedicoFalaNao" value="0"
                                           v-model="matricula.boxMedico.fala">
                                    <label for="boxMedicoFalaNao">Não</label>
                                </label>
                            </div>
                        </div>

                        <div class="form-group col-sm-12">
                            <div class="col-sm-3 -align-right">
                                <label for="boxMedicoAudicao">
                                    Deficiência auditivo:
                                </label>
                            </div>
                            <div class="col-sm-3 -align-left" id="boxMedicoAudicao">
                                <label class="checkbox-inline">
                                    <input type="radio" id="boxMedicoAudicaoSim" value="1"
                                           v-model="matricula.boxMedico.audicao">
                                    <label for="boxMedicoAudicaoSim">Sim</label>
                                </label>
                                <label class="checkbox-inline">
                                    <input type="radio" id="boxMedicoAudicaoNao" value="0"
                                           v-model="matricula.boxMedico.audicao">
                                    <label for="boxMedicoAudicaoNao">Não</label>
                                </label>
                            </div>
                        </div>

                        <div class="form-group col-sm-12">
                            <div class="col-sm-3 -align-right">
                                <label for="boxMedicoEdfisica">
                                    Deficiência Fisica:
                                </label>
                            </div>
                            <div class="col-sm-3 -align-left" id="boxMedicoEdfisica">
                                <label class="checkbox-inline">
                                    <input type="radio" id="boxMedicoEdfisicaSim" value="1"
                                           v-model="matricula.boxMedico.edfisica">
                                    <label for="boxMedicoEdfisicaSim">Sim</label>
                                </label>
                                <label class="checkbox-inline">
                                    <input type="radio" id="boxMedicoEdfisicaNao" value="0"
                                           v-model="matricula.boxMedico.edfisica">
                                    <label for="boxMedicoEdfisicaNao">Não</label>
                                </label>
                            </div>
                        </div>

                        <div class="form-group col-sm-12">
                            <div class="col-sm-3 -align-right">
                                <label for="aprensentouOutraDoenca">
                                    Aprensentou outra doença:
                                </label>
                            </div>
                            <div class="col-sm-3 -align-left" id="aprensentouOutraDoenca">
                                <label class="checkbox-inline">
                                    <textarea v-model="matricula.boxMedico.outradoenca" class="form-control" rows="2"
                                              cols="90"
                                              placeholder="Verme, Micose, Diarreia...">
                                    </textarea>
                                </label>

                            </div>
                        </div>
                        <div class="form-group col-sm-12"
                             v-show="choseVisible(matricula.boxMedico.sarampo || matricula.boxMedico.rubeola || matricula.boxMedico.catapora || matricula.boxMedico.escarlatina || matricula.boxMedico.bronquite || matricula.boxMedico.faltadear || matricula.boxMedico.diabetes || matricula.boxMedico.refluxo || matricula.boxMedico.convulsao || matricula.boxMedico.alergia)">
                            <div class="col-sm-3 -align-right">
                                <label for="medicamentotomar">
                                    Quais medicamentos toma:
                                </label>
                            </div>
                            <div class="col-sm-3 -align-left" id="medicamentotomar">
                                <label class="checkbox-inline">
                                    <textarea v-model="matricula.boxMedico.medicamentotomar" class="form-control"
                                              rows="2"
                                              cols="90" placeholder="Antialergico, Antigripal, Antibiotico...">
                                    </textarea>
                                </label>

                            </div>
                        </div>
                        <div class="form-group col-sm-12" v-show="choseVisible(matricula.boxMedico.alergia)">
                            <div class="col-sm-3 -align-right">
                                <label for="sintomasalergia">
                                    Sintomas da alergia:
                                </label>
                            </div>
                            <div class="col-sm-3 -align-left" id="sintomasalergia">
                                <label class="checkbox-inline">
                                    <textarea v-model="matricula.boxMedico.sintomasalergia" class="form-control"
                                              rows="2"
                                              cols="90" placeholder="Coceira, Espirros, Inchaços...">
                                    </textarea>
                                </label>

                            </div>
                        </div>
                        <div class="form-group col-sm-12">
                            <div class="col-sm-3 -align-right">
                                <label for="outradeficiencia">
                                    Outra Deficiência:
                                </label>
                            </div>
                            <div class="col-sm-3 -align-left" id="outradeficiencia">
                                <label class="checkbox-inline">
                                    <textarea v-model="matricula.boxMedico.outradeficiencia" class="form-control"
                                              rows="2"
                                              cols="90" placeholder="Autismo, Deficiência Mental, Perda de memória...">
                                    </textarea>
                                </label>

                            </div>
                        </div>
                    </boxDefault>
                </tab-content>
            </form-wizard>
        </template>
    </div>
</template>

<script>
    import 'vue-form-wizard/dist/vue-form-wizard.min.css'
    import VeeValidate, {Validator} from 'vee-validate';
    import ptBr from 'vee-validate/dist/locale/pt_BR';

    Validator.localize('pt_br', ptBr)
    Vue.use(VeeValidate);

    export default {
        name: "matricula",
        data: () => ({
            options: [],
            formStateBox: {
                boxAluno: true,
                boxResponsavel: true,
                boxMedico: true,
                uploadButtonFoto: false,
                step1: false,
                responsavel1Erro: false,
                rg_aluno: ''
            },
            matricula: {
                foto_aluno: '',
                nome_aluno: '',
                rg_aluno: '',
                data_nascimento_aluno: '',
                sexo_aluno: '',
                emailAluno: '',
                tipo_pessoas_id: 1,
                telefoneAluno: '',
                flg_certidao_nascimento_aluno: 0,
                flg_carteira_vacinacao_aluno: 0,
                flg_frequentou_escola_aluno: 0,
                flg_irmaos_aluno: 0,
                flg_juntos_aos_pais_aluno: 0,
                qtd_irmaos_aluno: '',
                responsavel1: null,
                responsavel2: null,
                boxMedico: {
                    sarampo: 0,
                    rubeola: 0,
                    catapora: 0,
                    escarlatina: 0,
                    outradoenca: '',
                    bronquite: 0,
                    faltadear: 0,
                    diabetes: 0,
                    refluxo: 0,
                    convulsao: 0,
                    alergia: 0,
                    visao: 0,
                    fala: 0,
                    audicao: 0,
                    edfisica: 0,
                    medicamentotomar: '',
                    sintomasalergia: '',
                    outradeficiencia: ''
                }
            }
        }),
        methods: {
            choseVisible(value) {
                if (value == 1) {
                    return true;
                }
                if (value == 2) {
                    return false;
                }

            },
            reduzirDiasData(dias) {
                var hoje = new Date();
                var dataVenc = new Date(hoje.getTime() - dias * 24 * 60 * 60 * 1000);
                return dataVenc.getDate() + "/" + (dataVenc.getMonth() + 1) + "/" + dataVenc.getFullYear();
            },
            validateStepAluno() {
                return this.$validator.validateAll('step1').then((result) => {
                    this.formStateBox.boxAluno = result;
                    return result;
                });
            },
            validateStepResponsaveis() {
                let resp1 = this.matricula.responsavel1;
                let resp2 = this.matricula.responsavel2;
                if (resp1 == null || resp1 == resp2) {
                    this.formStateBox.boxResponsavel = false;
                    this.formStateBox.responsavel1Erro = true;
                    return false;
                } else {
                    this.formStateBox.boxResponsavel = true;
                    this.formStateBox.responsavel1Erro = false;
                    return true
                }
            },
            onSearch(search, loading) {
                this.axios.get('/pessoas/getAjax?q=' + search).then((response) => {
                    this.options = response.data.map((now) => {
                        return {
                            "id": now.id,
                            "nome": now.nome + ' - ' + now.cpf_cnpj
                        }
                    });
                });
            },
            storeMatricula() {
                this.$http.post('/matricula', this.matricula).then((response) => {
                    window.location.href = "/alunos/" + response.data
                }).catch(response => {

                });
            },
            onChange(image) {
                console.log('New picture selected!')
                if (image) {
                    console.log('Picture loaded.')
                    this.matricula.foto_aluno = image
                } else {
                    console.log('FileReader API not supported: use the <form>, Luke!')
                }
            }
        }
    }

</script>

<style scoped>
    pre {
        overflow: auto;
    }

</style>