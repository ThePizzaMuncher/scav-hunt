<section class="about d-flex flex-column justify-content-center align-items-center sticked-header-offset"
    style="height: 100%;">
    <section id="about" class="section-50 d-flex flex-column align-items-center">

        <?php
        // vullen variabele programs met inhoud van database
        $winnaars = mysqli_query($conn, "SELECT * FROM winnaar");
        ?>
        <div class="row">
            <div class="col-xs-8"></div>
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title">Lijst met Winnaars</h3>
                </div>
            </div>

        </div>
        <?php

        echo "<div class='scrollable'><table border='1' cellpadding='10'>";
        echo "<thead>     
			<tr>    
				<th>Groepsnaam</th>
                <th>Datum</th>
			</tr>
		</thead>";
        echo '</div>';

        $pull = $conn->query("SELECT * FROM winnaar");
        while ($row = $pull->fetch_assoc()) {
            echo "<tr>";
            echo "<td>$row[groepsnaam]</td>";
            echo "<td>$row[datum]</td>";
            echo "</tr>";
        }

        echo "</table></div>";
        ?>

    </section>
</section>