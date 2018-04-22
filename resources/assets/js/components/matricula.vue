<template>
    <div>
        <template>
            <form-wizard title="Matricula de Aluno" subtitle="Criação de matrícula completa de alunos"
                         nextButtonText="Próximo" backButtonText="Voltar" finishButtonText="Criar matrícula"
                         color="#3c8cbc" errorColor="#f90000">
                <tab-content title="Aluno" icon="ti-ruler-pencil">
                    <!--<tab-content title="Aluno" icon="ti-ruler-pencil" :before-change="validateStepAluno">-->
                    <boxDefault title="Dados do Aluno" :stateBox="formStateBox.boxAluno">

                        <div class="col-lg-6">
                            <picture-input width="150" height="150" radius="10" accept="image/jpeg,image/png"
                                           v-model="foto_aluno"
                                           prefill="/uploads/avatarPadrao.jpg"
                                           :hideChangeButton="true"
                                           buttonClass="btn btn-primary"
                                           :customStrings="{
                                            drag: 'Foto do Aluno'
                                          }">
                            </picture-input>
                        </div>


                        <div class="col-lg-6">
                            <div :class="{'form-group':true,  'has-error': errors.has('nomeAluno')}">
                                <label class="control-label" for="nomeAluno">
                                    <i v-show="errors.has('nomeAluno')" class="fa fa-times-circle-o"></i>
                                    Campo obrigatório
                                </label>
                                <input name="nomeAluno" v-model="nomeAluno" type="text" class="form-control"
                                       id="nomeAluno" placeholder="Nome completo"
                                       v-validate="'required|alpha_spaces'">
                                <span class="help-block" v-show="errors.has('nomeAluno')">O campo Nome do Aluno é obrigatório</span>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div :class="{'form-group':true,  'has-error': errors.has('rgAluno')}">
                                <label class="control-label" for="rgAluno">
                                    <i v-show="errors.has('rgAluno')" class="fa fa-times-circle-o"></i>
                                    RG
                                </label>
                                <input name="rgAluno" v-model="rgAluno" type="text" class="form-control"
                                       id="rgAluno" placeholder="__.___.___-__"
                                       v-mask="'##.###.###-##'"
                                       v-validate="'required'">
                                <span class="help-block"
                                      v-show="errors.has('rgAluno')">O campo RG é obrigatório</span>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div :class="{'form-group':true,  'has-error': errors.has('dataNascimento')}">
                                <label class="control-label" for="dataNascimento">
                                    <i v-show="errors.has('dataNascimento')" class="fa fa-times-circle-o"></i>
                                    Data de nascimento
                                </label>
                                <input name="dataNascimento" v-model="dataNascimento" type="text" class="form-control"
                                       id="dataNascimento" placeholder="__/__/____"
                                       v-mask="'##/##/####'"
                                       v-validate="'required|date_format:DD/MM/YYYY'">
                                <span class="help-block"
                                      v-show="errors.has('dataNascimento')">{{ errors.first('dataNascimento') }}</span>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div :class="{'form-group':true,  'has-error': errors.has('sexoAuno')}">
                                <label class="control-label" for="sexoAuno">
                                    <i v-show="errors.has('sexoAuno')" class="fa fa-times-circle-o"></i>
                                    Sexo
                                </label>
                                <select name="sexoAuno" v-model="sexoAuno" class="form-control" id="sexoAuno"
                                        v-validate="'required|in:1,2,3'">
                                    <option value="1">Feminino</option>
                                    <option value="2">Masculino</option>
                                    <option value="3">Outros</option>
                                </select>

                                <span class="help-block"
                                      v-show="errors.has('sexoAuno')">{{ errors.first('sexoAuno') }}</span>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div :class="{'form-group':true,  'has-error': errors.has('emailAluno')}">
                                <label class="control-label" for="emailAluno">
                                    <i v-show="errors.has('emailAluno')" class="fa fa-times-circle-o"></i>
                                    Email
                                </label>
                                <input name="emailAluno" v-model="emailAluno" type="text" class="form-control"
                                       id="emailAluno" placeholder="email@email.com.br"
                                       v-validate="'required|email'">
                                <span class="help-block"
                                      v-show="errors.has('emailAluno')">O campo Email é obrigatório</span>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div :class="{'form-group':true,  'has-error': errors.has('telefoneAluno')}">
                                <label class="control-label" for="telefoneAluno">
                                    <i v-show="errors.has('telefoneAluno')" class="fa fa-times-circle-o"></i>
                                    Telefone
                                </label>
                                <input name="telefoneAluno" v-model="telefoneAluno" type="text" class="form-control"
                                       id="telefoneAluno" placeholder="(00) 0 0000-0000"
                                       v-mask="'(##) # ####-####'"
                                       v-validate="'required|min:15'">
                                <span class="help-block"
                                      v-show="errors.has('telefoneAluno')">O campo Telefone é obrigatório</span>
                            </div>
                        </div>

                        <div class="form-group col-sm-12">
                            <div class="col-sm-3 -align-right">
                                <label for="flg_certidao_nascimento_aluno">
                                    Apresentou certidao de nascimento:
                                </label>
                            </div>
                            <div class="col-sm-3 -align-left" id="flg_certidao_nascimento_aluno">
                                <label class="checkbox-inline">
                                    <input type="radio" id="flg_certidao_nascimento_alunoSim" value="1"
                                           v-model="flg_certidao_nascimento_aluno">
                                    <label for="flg_certidao_nascimento_alunoSim">Sim</label>
                                </label>
                                <label class="checkbox-inline">
                                    <input type="radio" id="flg_certidao_nascimento_alunoNao" value="0"
                                           v-model="flg_certidao_nascimento_aluno">
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
                                           v-model="flg_carteira_vacinacao_aluno">
                                    <label for="flg_carteira_vacinacao_alunoSim">Sim</label>
                                </label>
                                <label class="checkbox-inline">
                                    <input type="radio" id="flg_carteira_vacinacao_alunoNao" value="0"
                                           v-model="flg_carteira_vacinacao_aluno">
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
                                           v-model="flg_frequentou_escola_aluno">
                                    <label for="flg_frequentou_escola_alunoSim">Sim</label>
                                </label>
                                <label class="checkbox-inline">
                                    <input type="radio" id="flg_frequentou_escola_alunoNao" value="0"
                                           v-model="flg_frequentou_escola_aluno">
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
                                           v-model="flg_irmaos_aluno">
                                    <label for="flg_irmaos_alunoSim">Sim</label>
                                </label>
                                <label class="checkbox-inline">
                                    <input type="radio" id="flg_irmaos_alunoNao" value="0"
                                           v-model="flg_irmaos_aluno">
                                    <label for="flg_irmaos_alunoNao">Não</label>
                                </label>
                            </div>
                        </div>

                        <div class="form-group col-sm-12" v-show="choseVisible(flg_irmaos_aluno)">
                            <div class="col-sm-3 -align-right">
                                <label for="qtd_irmaos_aluno">
                                    Quantos irmãos?
                                </label>
                            </div>
                            <div class="col-sm-3 -align-left">
                                <div :class="{'form-group':true,  'has-error': errors.has('qtd_irmaos_aluno')}">
                                    <input name="qtd_irmaos_aluno" v-model="qtd_irmaos_aluno" type="text"
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
                                           v-model="flg_juntos_aos_pais_aluno">
                                    <label for="flg_juntos_aos_pais_alunoSim">Sim</label>
                                </label>
                                <label class="checkbox-inline">
                                    <input type="radio" id="flg_juntos_aos_pais_alunoNao" value="0"
                                           v-model="flg_juntos_aos_pais_aluno">
                                    <label for="flg_juntos_aos_pais_alunoNao">Não</label>
                                </label>
                            </div>
                        </div>

                    </boxDefault>
                </tab-content>
                <tab-content title="Responsável" icon="ti-ruler">
                    <boxDefault title="Dados dos Responsáveis" :stateBox="formStateBox.boxResponsavel">
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
                                    <input type="radio" id="boxMedicoSarampoSim" value="1" v-model="boxMedico.sarampo">
                                    <label for="boxMedicoSarampoSim">Sim</label>
                                </label>
                                <label class="checkbox-inline">
                                    <input type="radio" id="boxMedicoSarampoNao" value="0" v-model="boxMedico.sarampo">
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
                                    <input type="radio" id="boxMedicoRubeolaSim" value="1" v-model="boxMedico.rubeola">
                                    <label for="boxMedicoRubeolaSim">Sim</label>
                                </label>
                                <label class="checkbox-inline">
                                    <input type="radio" id="boxMedicoRubeolaNao" value="0" v-model="boxMedico.rubeola">
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
                                           v-model="boxMedico.catapora">
                                    <label for="boxMedicoCataporaSim">Sim</label>
                                </label>
                                <label class="checkbox-inline">
                                    <input type="radio" id="boxMedicoCataporaNao" value="0"
                                           v-model="boxMedico.catapora">
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
                                           v-model="boxMedico.escarlatina">
                                    <label for="boxMedicoEscarlatinaSim">Sim</label>
                                </label>
                                <label class="checkbox-inline">
                                    <input type="radio" id="boxMedicoEscarlatinaNao" value="0"
                                           v-model="boxMedico.escarlatina">
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
                                           v-model="boxMedico.bronquite">
                                    <label for="boxMedicoBronquiteSim">Sim</label>
                                </label>
                                <label class="checkbox-inline">
                                    <input type="radio" id="boxMedicoBronquiteNao" value="0"
                                           v-model="boxMedico.bronquite">
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
                                           v-model="boxMedico.faltadear">
                                    <label for="boxMedicoFaltadearSim">Sim</label>
                                </label>
                                <label class="checkbox-inline">
                                    <input type="radio" id="boxMedicoFaltadearNao" value="0"
                                           v-model="boxMedico.faltadear">
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
                                           v-model="boxMedico.diabetes">
                                    <label for="boxMedicoDiabeteSim">Sim</label>
                                </label>
                                <label class="checkbox-inline">
                                    <input type="radio" id="boxMedicoDiabeteNao" value="0"
                                           v-model="boxMedico.diabetes">
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
                                           v-model="boxMedico.refluxo">
                                    <label for="boxMedicoRefluxoSim">Sim</label>
                                </label>
                                <label class="checkbox-inline">
                                    <input type="radio" id="boxMedicoRefluxoNao" value="0"
                                           v-model="boxMedico.refluxo">
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
                                           v-model="boxMedico.convulsao">
                                    <label for="boxMedicoConvulsaoSim">Sim</label>
                                </label>
                                <label class="checkbox-inline">
                                    <input type="radio" id="boxMedicoConvulsaoNao" value="0"
                                           v-model="boxMedico.convulsao">
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
                                           v-model="boxMedico.alergia">
                                    <label for="boxMedicoAlergiaSim">Sim</label>
                                </label>
                                <label class="checkbox-inline">
                                    <input type="radio" id="boxMedicoAlergiaNao" value="0"
                                           v-model="boxMedico.alergia">
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
                                           v-model="boxMedico.visao">
                                    <label for="boxMedicoVisaoSim">Sim</label>
                                </label>
                                <label class="checkbox-inline">
                                    <input type="radio" id="boxMedicoVisaoNao" value="0"
                                           v-model="boxMedico.visao">
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
                                           v-model="boxMedico.fala">
                                    <label for="boxMedicoFalaSim">Sim</label>
                                </label>
                                <label class="checkbox-inline">
                                    <input type="radio" id="boxMedicoFalaNao" value="0"
                                           v-model="boxMedico.fala">
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
                                           v-model="boxMedico.audicao">
                                    <label for="boxMedicoAudicaoSim">Sim</label>
                                </label>
                                <label class="checkbox-inline">
                                    <input type="radio" id="boxMedicoAudicaoNao" value="0"
                                           v-model="boxMedico.audicao">
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
                                           v-model="boxMedico.edfisica">
                                    <label for="boxMedicoEdfisicaSim">Sim</label>
                                </label>
                                <label class="checkbox-inline">
                                    <input type="radio" id="boxMedicoEdfisicaNao" value="0"
                                           v-model="boxMedico.edfisica">
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
                                    <textarea v-model="boxMedico.outradoenca" class="form-control" rows="2" cols="90"
                                              placeholder="Verme, Micose, Diarreia...">
                                    </textarea>
                                </label>

                            </div>
                        </div>
                        <div class="form-group col-sm-12"
                             v-show="choseVisible(boxMedico.sarampo || boxMedico.rubeola || boxMedico.catapora || boxMedico.escarlatina || boxMedico.bronquite || boxMedico.faltadear || boxMedico.diabetes || boxMedico.refluxo || boxMedico.convulsao || boxMedico.alergia)">
                            <div class="col-sm-3 -align-right">
                                <label for="medicamentotomar">
                                    Quais medicamentos toma:
                                </label>
                            </div>
                            <div class="col-sm-3 -align-left" id="medicamentotomar">
                                <label class="checkbox-inline">
                                    <textarea v-model="boxMedico.medicamentotomar" class="form-control" rows="2"
                                              cols="90" placeholder="Antialergico, Antigripal, Antibiotico...">
                                    </textarea>
                                </label>

                            </div>
                        </div>
                        <div class="form-group col-sm-12" v-show="choseVisible(boxMedico.alergia)">
                            <div class="col-sm-3 -align-right">
                                <label for="sintomasalergia">
                                    Sintomas da alergia:
                                </label>
                            </div>
                            <div class="col-sm-3 -align-left" id="sintomasalergia">
                                <label class="checkbox-inline">
                                    <textarea v-model="boxMedico.sintomasalergia" class="form-control" rows="2"
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
                                    <textarea v-model="boxMedico.outradeficiencia" class="form-control" rows="2"
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
            formStateBox: {
                boxAluno: true,
                boxResponsavel: true,
                boxMedico: true,
                uploadButtonFoto: false,
            },
            foto_aluno: '',
            nomeAluno: '',
            rgAluno: '',
            dataNascimento: '',
            sexoAuno: '',
            emailAluno: '',
            telefoneAluno: '',
            flg_certidao_nascimento_aluno: 0,
            flg_carteira_vacinacao_aluno: 0,
            flg_frequentou_escola_aluno: 0,
            flg_irmaos_aluno: 0,
            flg_juntos_aos_pais_aluno: 0,
            qtd_irmaos_aluno: '',
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
            getDateMinAndMax() {
                let min = this.reduzirDiasData(2192);
                let max = this.reduzirDiasData(720);
                return new Date();
            },
            reduzirDiasData(dias) {
                var hoje = new Date();
                var dataVenc = new Date(hoje.getTime() - dias * 24 * 60 * 60 * 1000);
                return dataVenc.getDate() + "/" + (dataVenc.getMonth() + 1) + "/" + dataVenc.getFullYear();
            },
            validateStepAluno() {
                // this.formStateBox.boxAluno = this.$validator.validateAll();
                return this.$validator.validateAll().then((result) => {
                    this.formStateBox.boxAluno = result;

                    return result;
                });
            }
        }
    }
</script>

<style scoped>
    pre {
        overflow: auto;
    }

    pre .string {
        color: #885800;
    }

    pre .number {
        color: blue;
    }

    pre .boolean {
        color: magenta;
    }

    pre .null {
        color: red;
    }

    pre .key {
        color: green;
    }
</style>