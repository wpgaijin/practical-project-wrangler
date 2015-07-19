<div class="ppw__registration_form">
    <form method="post" action="">
        <div class="ppw__th">
            <label for="user_client">Client</label>
        </div>
        <div class="ppw__td">
            <?php $clients = get_posts('post_type=' . PPW_PREFIX . '_clients' );?>
            <select id="user_client" name="user_client" class="required">
                <option value="">Choose a client for this user.</option>
                <?php foreach ( $clients as $client  ) : ?>
                <option value="<?php echo $client->ID; ?>"><?php echo $client->post_title; ?></option>
                <?php endforeach; ?>
            </select>
        </div>   
        <div class="ppw__th">
        	<label for="user_login">Username</label>
        </div>
    	<div class="ppw__td">
    		<input name="user_login" id="user_login" type="text" class="required"/>
    	</div>

    	<div class="ppw__th">
        	<label for="user_email">Email</label>
        </div>
    	<div class="ppw__td">
    		<input name="user_email" id="user_email" class="required" type="email" />
        </div>

    	<div class="ppw__th">
        	<label for="user_pass">Password</label>
        </div>
    	<div class="ppw__td">
    		<input name="user_pass" id="user_pass" class="required" type="password"/>
        </div>

        <div class="ppw__th">
        	<label for="rpass_confirm">Re-type Password</label>
        </div>
    	<div class="ppw__td">
    		<input name="pass_confirm" id="pass_confirm" class="required" type="password"/>
        </div>

    	<div class="ppw__td">
    			<span id="password-strength"></span>
        </div>

    	<div class="ppw__th">
        	<label for="user_first">First Name</label>
        </div>
    	<div class="ppw__td">
    		<input name="user_first" id="user_first" type="text" />
    	</div>

    	<div class="ppw__th">
        	<label for="user_last">Last Name</label>
        </div>
    	<div class="ppw__td">
    		<input name="user_last" id="user_last" type="text" />
    	</div>

        <div class="ppw__form-submit">
    		<input type="hidden" name="<?php echo PPW_PREFIX; ?>_register_nonce" value="<?php echo wp_create_nonce( PPW_PREFIX  . '-register-nonce'); ?>"/>
    		<input type="submit" class="ppw__submit" name="reg_submit" value="Register" disabled="disabled"/>
    	</div>
    </form>
</div>