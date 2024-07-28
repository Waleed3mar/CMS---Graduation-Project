<div id="dnxte-ppro_setting-navigation">

	<ul class="dnxte-ppro_setting-nav-tab-wrapper trigger-effect-tabs">
      <li data-tab-target="#dnxte_general" class="active dnxte-ppro-tabs">
        <a
            class="dnxte-ppro_setting-nav-tab dnxte-ppro-tab"
            
        >
          <?php esc_html_e('General', 'dnxte-divi-essential') ?>
        </a>
      </li>
      <li data-tab-target="#dnxte_customization" class="dnxte-ppro-tabs">
        <a
          class="dnxte-ppro_setting-nav-tab dnxte-ppro-tab"
        >
            <?php esc_html_e('Customization', 'dnxte-divi-essential') ?>
        </a>
      </li>
      <li data-tab-target="#dnxte_display" class="dnxte-ppro-tabs">
        <a
          class="dnxte-ppro_setting-nav-tab dnxte-ppro-tab"
        >
            <?php esc_html_e('Display', 'dnxte-divi-essential') ?>
        </a>
      </li>
    </ul>

    <div class="tab-content">
        <div id="dnxte_general" data-tab-content class="active">
            <?php include 'partials/general/index.php'; ?>
        </div>
        <div id="dnxte_customization" data-tab-content>
            <?php include 'partials/customization/index.php'; ?>
        </div>
        <div id="dnxte_display" data-tab-content>
            <?php include 'partials/display/index.php'; ?>
        </div>
    </div>

    <div id="custom-meta-box-nonce" class="hidden">
     
    </span>
</div>
