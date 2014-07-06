<?php

namespace dk\SchoolManagerBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class dkSchoolManagerBundle extends Bundle {

    public function getParent() {
        return 'FOSUserBundle';
    }

}
