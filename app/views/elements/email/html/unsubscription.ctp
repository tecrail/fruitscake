<p>
	<?php str_replace("%s", Configure::read('App.baseTitle'), __("To stop receiving newsletters from %s click the following link", true)) ?>:
</p>
<p>
	<?php
	echo $this->Html->link(
		__("Click here to proceed to the elimination from the newsletter", true),
		"http://{$_SERVER['HTTP_HOST']}/newsletter_users/confirm_unsubscription/{$newsletterUser['NewsletterUser']['id']}/key:{$key}"
	);
	?>
</p>
