<?php

add_action('widgets_init', 'al_pat_pl_registra_widget');

function al_pat_pl_registra_widget(){
    register_widget('PatrocinadoresAlura');
}

class PatrocinadoresAlura extends WP_Widget{
    public function __construct()
    {
        parent::__construct(
            'al_patrocinadores_palestras_widget',
            'Patrocinadores Palestras',
            array('description' => "Selecione os patrocinadores das palestras")
        );
    }

    public function form($instance){
        ?>
        <p>
            <input type="checkbox" id="<?= $this->get_field_id('caelum') ?>"
            name="<?= $this->get_field_name('caelum') ?>" 
            value="1">
            <label for="<?= $this->get_field_id("caelum")?>">Caelun</label>
        </p>
        <p>
            <input type="checkbox" id="<?= $this->get_field_id('casa_do_codigo') ?>"
            name="<?= $this->get_field_name('casa_do_codigo') ?>" 
            value="1">
            <label for="<?= $this->get_field_id("casa_do_codigo")?>">Casa do Código</label>
        </p>
        <p>
            <input type="checkbox" id="<?= $this->get_field_id('hipters') ?>"
            name="<?= $this->get_field_name('hipters') ?>" 
            value="1">
            <label for="<?= $this->get_field_id("hipters")?>">Hipters</label>
        </p>
        <?php
    }

    public function update($new_instance, $old_stance)
    {
        $instance = array();
        $instance['caelum'] = !empty($new_instance['caelum']) ? strip_tags($new_instance['caelum']) : '';
        $instance['casa_do_codigo'] = !empty($new_instance['casa_do_codigo']) ? strip_tags($new_instance['casa_do_codigo']) : '';
        $instance['hipters'] = !empty($new_instance['hipters']) ? strip_tags($new_instance['hipters']) : '';
        return $instance;
    }

    public function widget($args, $instance)
    {
        ?>
            <section class="patrocinadores-principais">
                <h3 class="titulo-patrocinadores">Patrocinadores</h3>
                    <ul class="lista-patrocinadores">
                        <?php if(!empty($instance['caelum'])): ?>
                            <li><img src="<?= plugin_dir_url(__FILE__) . '../imagens/caelum.png' ?>"/></li>
                        <?php endif; ?>
                        <?php if(!empty($instance['casa_do_codigo'])): ?>
                            <li><img src="<?= plugin_dir_url(__FILE__) . '../imagens/casa-do-codigo.png' ?>"/></li>
                        <?php endif; ?>
                        <?php if(!empty($instance['hipters'])): ?>
                            <li><img src="<?= plugin_dir_url(__FILE__) . '../imagens/hipters.png' ?>"/></li>
                        <?php endif; ?>
                    </ul> 
            </section>
        <?php
    }
}