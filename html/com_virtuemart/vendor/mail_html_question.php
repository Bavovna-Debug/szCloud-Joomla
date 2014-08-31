<?php defined('_JEXEC') or die('Restricted access'); ?>

<html>
	<head>
		<style type="text/css">

body, td, span, p, th { }

table.html-email {
	margin: 10px auto;
	background: white;
	border: 1px solid #DAD8D8;
}

.html-email tr { border-bottom: 1px solid #EEE; }
span.grey { color: #666; }
span.date { color: #666; }

a.default:link, a.default:hover, a.default:visited {
	color: #666;
	line-height: 25px;
	background: #F2F2F2;
	margin: 10px;
	padding: 3px 8px 1px 8px;
	border: 1px solid #CAC9C9;
	border-radius: 4px;
	-webkit-border-radius: 4px;
	-moz-border-radius: 4px;
	text-shadow: 1px 1px 1px #F2F2F2;
	background-position: 0;
	display: inline-block;
	text-decoration: none;
}

a.default:hover {
	color: #888;
	background: #F8F8F8;
}

.cart-summary { }

.html-email th {
	background: #CCC;
	margin: 0;
	padding: 10px;
}

.sectiontableentry2, .html-email th, .cart-summary th {
	background: #CCC;
	margin: 0;
	padding: 10px;
}

.sectiontableentry1, .html-email td, .cart-summary td {
	background: #FFF;
	margin: 0;
	padding: 10px;
}

		</style>
	</head>

	<body style="background: #F2F2F2; word-wrap: break-word;">
		<div style="background-color: #E6E6E6;" width="100%">
			<table style="margin: auto;" cellpadding="0" cellspacing="0" width="600">
				<tr>
					<td>
						<table width="100%" border="0" cellpadding="0" cellspacing="0" class="html-email">
							<tr>
								<td>
				 					<?php echo JText::sprintf('COM_VIRTUEMART_WELCOME_VENDOR', $this->vendor->vendor_store_name) ?>
									<br />
								</td>
							</tr>
						</table>

						<table class="html-email" cellspacing="0" cellpadding="0" border="0" width="100%">
							<tr >
								<th width="100%">
									<?php echo JText::_('COM_VIRTUEMART_VENDOR_CONTACT') . ' ' . $this->vendor->vendor_name ?>
								</th>
							</tr>
							<tr>
								<td valign="top" width="100%">
				 					<?php echo JText::sprintf('COM_VIRTUEMART_QUESTION_MAIL_FROM', $this->user['name'], $this->user['email']) ?>
									<br />
									<?php echo nl2br($this->comment) ?>
									<br />
								</td>
							</tr>
						</table>
		 			</td>
				</tr>
			</table>
		</div>
	</body>
</html>