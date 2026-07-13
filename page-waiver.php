<?php
/*
 * Template Name: Registration
 * Account creation form — replaces the old waiver page.
 */

// If already logged in, redirect to shop
if (is_user_logged_in()) {
    wp_redirect(home_url('/shop/'));
    exit;
}

get_header();

$redirect_to = isset($_GET['redirect_to']) ? esc_url($_GET['redirect_to']) : home_url('/shop/');
$errors = get_transient('ab_reg_errors');
$form_data = get_transient('ab_reg_form_data');
delete_transient('ab_reg_errors');
delete_transient('ab_reg_form_data');

// Helper to repopulate fields
$val = function($key, $default = '') use ($form_data) {
    return esc_attr($form_data[$key] ?? $default);
};

$states = [
    'AL'=>'Alabama','AK'=>'Alaska','AZ'=>'Arizona','AR'=>'Arkansas','CA'=>'California',
    'CO'=>'Colorado','CT'=>'Connecticut','DE'=>'Delaware','FL'=>'Florida','GA'=>'Georgia',
    'HI'=>'Hawaii','ID'=>'Idaho','IL'=>'Illinois','IN'=>'Indiana','IA'=>'Iowa',
    'KS'=>'Kansas','KY'=>'Kentucky','LA'=>'Louisiana','ME'=>'Maine','MD'=>'Maryland',
    'MA'=>'Massachusetts','MI'=>'Michigan','MN'=>'Minnesota','MS'=>'Mississippi','MO'=>'Missouri',
    'MT'=>'Montana','NE'=>'Nebraska','NV'=>'Nevada','NH'=>'New Hampshire','NJ'=>'New Jersey',
    'NM'=>'New Mexico','NY'=>'New York','NC'=>'North Carolina','ND'=>'North Dakota','OH'=>'Ohio',
    'OK'=>'Oklahoma','OR'=>'Oregon','PA'=>'Pennsylvania','RI'=>'Rhode Island','SC'=>'South Carolina',
    'SD'=>'South Dakota','TN'=>'Tennessee','TX'=>'Texas','UT'=>'Utah','VT'=>'Vermont',
    'VA'=>'Virginia','WA'=>'Washington','WV'=>'West Virginia','WI'=>'Wisconsin','WY'=>'Wyoming',
    'DC'=>'District of Columbia',
];
?>

  <section class="ab-quality-hero">
    <div class="ab-hero-gradient"></div>
    <div class="ab-hero-noise"></div>
    <div class="ab-container">
      <div class="ab-quality-hero-content">
        <p class="ab-label ab-label-decorated ab-reveal">Get Started</p>
        <h1 class="ab-hero-heading ab-reveal">
          <span class="ab-heading-light">Create Your</span>
          <span class="ab-heading-bold ab-gradient-text">Account.</span>
        </h1>
        <p class="ab-hero-sub ab-reveal">
          Sign up in under a minute. Once registered, you'll have instant access to our full catalog of professional-grade peptide compounds.
        </p>
      </div>
    </div>
  </section>

  <section class="ab-section ab-section-surface">
    <div class="ab-container">
      <div class="ab-reg-form-wrap">

        <?php if ($errors) : ?>
          <div class="ab-reg-errors">
            <?php foreach ($errors as $error) : ?>
              <p><?php echo wp_kses_post($error); ?></p>
            <?php endforeach; ?>
          </div>
        <?php endif; ?>

        <form method="post" action="<?php echo esc_url(home_url('/waiver/')); ?>" class="ab-reg-form" novalidate>
          <?php wp_nonce_field('ab_register', 'ab_register_nonce'); ?>
          <input type="hidden" name="ab_redirect_to" value="<?php echo esc_attr($redirect_to); ?>">

          <h3 class="ab-reg-section-title">Personal Information</h3>
          <div class="ab-reg-row">
            <div class="ab-reg-field">
              <label for="ab_first_name">First Name <span class="ab-req">*</span></label>
              <input type="text" id="ab_first_name" name="ab_first_name" value="<?php echo $val('ab_first_name'); ?>" required>
            </div>
            <div class="ab-reg-field">
              <label for="ab_last_name">Last Name <span class="ab-req">*</span></label>
              <input type="text" id="ab_last_name" name="ab_last_name" value="<?php echo $val('ab_last_name'); ?>" required>
            </div>
          </div>

          <div class="ab-reg-field">
            <label for="ab_email">Email Address <span class="ab-req">*</span></label>
            <input type="email" id="ab_email" name="ab_email" value="<?php echo $val('ab_email'); ?>" required>
          </div>

          <div class="ab-reg-row">
            <div class="ab-reg-field">
              <label for="ab_phone">Phone Number <span class="ab-req">*</span></label>
              <input type="tel" id="ab_phone" name="ab_phone" value="<?php echo $val('ab_phone'); ?>" required>
            </div>
            <div class="ab-reg-field">
              <label for="ab_dob">Date of Birth <span class="ab-req">*</span></label>
              <input type="date" id="ab_dob" name="ab_dob" value="<?php echo $val('ab_dob'); ?>" required>
            </div>
          </div>

          <h3 class="ab-reg-section-title">Shipping Address</h3>
          <div class="ab-reg-field">
            <label for="ab_address_1">Street Address <span class="ab-req">*</span></label>
            <input type="text" id="ab_address_1" name="ab_address_1" value="<?php echo $val('ab_address_1'); ?>" required>
          </div>

          <div class="ab-reg-field">
            <label for="ab_address_2">Apt / Unit / Suite</label>
            <input type="text" id="ab_address_2" name="ab_address_2" value="<?php echo $val('ab_address_2'); ?>">
          </div>

          <div class="ab-reg-row ab-reg-row-3">
            <div class="ab-reg-field">
              <label for="ab_city">City <span class="ab-req">*</span></label>
              <input type="text" id="ab_city" name="ab_city" value="<?php echo $val('ab_city'); ?>" required>
            </div>
            <div class="ab-reg-field">
              <label for="ab_state">State <span class="ab-req">*</span></label>
              <select id="ab_state" name="ab_state" required>
                <option value="">Select...</option>
                <?php foreach ($states as $abbr => $name) : ?>
                  <option value="<?php echo esc_attr($abbr); ?>"<?php selected($val('ab_state'), $abbr); ?>><?php echo esc_html($name); ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="ab-reg-field">
              <label for="ab_zip">ZIP Code <span class="ab-req">*</span></label>
              <input type="text" id="ab_zip" name="ab_zip" value="<?php echo $val('ab_zip'); ?>" maxlength="5" pattern="\d{5}" required>
            </div>
          </div>

          <h3 class="ab-reg-section-title">Acknowledgments</h3>
          <div class="ab-reg-checkboxes">
            <label class="ab-reg-check">
              <input type="checkbox" name="ab_check_age" value="1"<?php checked(!empty($form_data['ab_check_age'])); ?> required>
              <span>I am 18 years of age or older. <a href="/age-policy/" target="_blank">Age Policy</a></span>
            </label>
            <label class="ab-reg-check">
              <input type="checkbox" name="ab_check_research" value="1"<?php checked(!empty($form_data['ab_check_research'])); ?> required>
              <span>I understand these products are intended for research purposes only. <a href="/research-use-policy/" target="_blank">Research Use Policy</a></span>
            </label>
            <label class="ab-reg-check">
              <input type="checkbox" name="ab_check_risk" value="1"<?php checked(!empty($form_data['ab_check_risk'])); ?> required>
              <span>I acknowledge the risks associated with peptide research compounds and accept full responsibility for their use. <a href="/risk-acknowledgment/" target="_blank">Risk Acknowledgment</a></span>
            </label>
          </div>

          <button type="submit" class="ab-btn ab-btn-primary ab-btn-lg ab-reg-submit">Create Account</button>

          <p class="ab-reg-login-link">Already have an account? <a href="<?php echo esc_url(wp_login_url($redirect_to)); ?>">Log in</a></p>
        </form>

      </div>
    </div>
  </section>

<?php get_footer(); ?>
