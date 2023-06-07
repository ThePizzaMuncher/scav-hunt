<?php require_once("../assets/includes/header.php"); ?>

<section class="about d-flex flex-column justify-content-center align-items-center sticked-header-offset" style="height: 100%;">
	<section id="about" class="section-50 d-flex flex-column align-items-center">
		<?php
			$filePath = "about.txt";

		
			function formatText($text) {
				$text = preg_replace("/\*(.*?)\*/", "<em>$1</em>", $text);
				$text = preg_replace("/\*\*(.*?)\*\*/", "<strong>$1</strong>", $text);
				$text = preg_replace("/__(.*?)__/", "<u>$1</u>", $text);

				return $text;
			}

			$content = formatText(file_get_contents($filePath));

			$lines = explode("\n", $content);
			foreach ($lines as $line) {
				if (preg_match("/^###/", $line)) {
					echo "<h3>" . substr($line, 3) . "</h3>";
				} elseif (preg_match("/^##/", $line)) {
					echo "<h2>" . substr($line, 2) . "</h2>";
				} elseif (preg_match("/^#/", $line)) {
					echo "<h1>" . substr($line, 1) . "</h1>";
				} else {
					echo "<p>" . $line . "</p>";
				}
			}

			
		?>
	</section>
</section>

<?php require_once("../assets/includes/footer.php"); ?>
