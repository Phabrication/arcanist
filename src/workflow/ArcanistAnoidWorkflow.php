<?php

final class ArcanistAnoidWorkflow
  extends ArcanistArcWorkflow {

  public function getWorkflowName() {
    return 'anoid';
  }

  public function getWorkflowInformation() {
    $help = pht(<<<EOTEXT
Take control of a probe launched from the science vessel "Arcanoid".
EOTEXT
);

    return $this->newWorkflowInformation()
      ->setSynopsis(pht('Pilot a probe from the vessel "Arcanoid".'))
      ->addExample(pht('**anoid**'))
      ->setHelp($help);
  }

  public function getWorkflowArguments() {
    return array();
  }

  public function runWorkflow() {
    if (!Filesystem::binaryExists('/usr/local/bin/python3.9')) {
      throw new PhutilArgumentUsageException(
        pht(
          'The "arc anoid" workflow requires "/usr/local/bin/python3.9" to be available.'));
    }

    $support_dir = phutil_get_library_root('arcanist');
    $support_dir = dirname($support_dir);
    $support_dir = $support_dir.'/support/';

    $bin = $support_dir.'arcanoid/arcanoid.py';

    return phutil_passthru('%R', $bin);
  }

}
