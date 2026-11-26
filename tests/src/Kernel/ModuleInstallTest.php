<?php

declare(strict_types=1);

namespace Drupal\Tests\webform_handoff\Kernel;

use Drupal\KernelTests\KernelTestBase;
use PHPUnit\Framework\Attributes\Group;
use PHPUnit\Framework\Attributes\RunTestsInSeparateProcesses;

/**
 * Tests that the module installs together with its dependencies.
 */
#[Group('webform_handoff')]
#[RunTestsInSeparateProcesses]
final class ModuleInstallTest extends KernelTestBase {

  /**
   * {@inheritdoc}
   */
  protected static $modules = ['system', 'user'];

  /**
   * Tests that installing the module also installs Webform.
   */
  public function testInstall(): void {
    $this->installConfig(['system']);
    $this->installEntitySchema('user');

    $installed = $this->container->get('module_installer')->install(['webform_handoff']);
    self::assertTrue($installed);

    $module_handler = \Drupal::moduleHandler();
    self::assertTrue($module_handler->moduleExists('webform'));
    self::assertTrue($module_handler->moduleExists('webform_handoff'));
  }

}
