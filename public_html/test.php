<?php
system('/usr/bin/php ../artisan migrate');
system('/usr/bin/php ../artisan db:seed');
