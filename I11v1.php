<?php
//Unix only
print_r("Count ".`ls|wc -l`);
print_r(`ls`);
