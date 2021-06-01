<?php

// autoload_classmap.php @generated by Composer

$vendorDir = dirname(dirname(__FILE__));
$baseDir = dirname($vendorDir);

return array(
    'Composer\\InstalledVersions' => $vendorDir . '/composer/InstalledVersions.php',
    'WebpConverter\\Action\\ConvertAttachment' => $baseDir . '/src/Action/ConvertAttachment.php',
    'WebpConverter\\Action\\ConvertDir' => $baseDir . '/src/Action/ConvertDir.php',
    'WebpConverter\\Action\\ConvertPaths' => $baseDir . '/src/Action/ConvertPaths.php',
    'WebpConverter\\Action\\DeletePaths' => $baseDir . '/src/Action/DeletePaths.php',
    'WebpConverter\\Action\\RegenerateAll' => $baseDir . '/src/Action/RegenerateAll.php',
    'WebpConverter\\Conversion\\Cron\\Event' => $baseDir . '/src/Conversion/Cron/Event.php',
    'WebpConverter\\Conversion\\Cron\\Schedules' => $baseDir . '/src/Conversion/Cron/Schedules.php',
    'WebpConverter\\Conversion\\Directories' => $baseDir . '/src/Conversion/Directories.php',
    'WebpConverter\\Conversion\\DirectoryFiles' => $baseDir . '/src/Conversion/DirectoryFiles.php',
    'WebpConverter\\Conversion\\Directory\\DirectoriesIntegration' => $baseDir . '/src/Conversion/Directory/DirectoriesIntegration.php',
    'WebpConverter\\Conversion\\Directory\\DirectoryAbstract' => $baseDir . '/src/Conversion/Directory/DirectoryAbstract.php',
    'WebpConverter\\Conversion\\Directory\\DirectoryInterface' => $baseDir . '/src/Conversion/Directory/DirectoryInterface.php',
    'WebpConverter\\Conversion\\Directory\\GalleryDirectory' => $baseDir . '/src/Conversion/Directory/GalleryDirectory.php',
    'WebpConverter\\Conversion\\Directory\\PluginsDirectory' => $baseDir . '/src/Conversion/Directory/PluginsDirectory.php',
    'WebpConverter\\Conversion\\Directory\\ThemesDirectory' => $baseDir . '/src/Conversion/Directory/ThemesDirectory.php',
    'WebpConverter\\Conversion\\Directory\\UploadsDirectory' => $baseDir . '/src/Conversion/Directory/UploadsDirectory.php',
    'WebpConverter\\Conversion\\Directory\\UploadsWebpcDirectory' => $baseDir . '/src/Conversion/Directory/UploadsWebpcDirectory.php',
    'WebpConverter\\Conversion\\Endpoint\\EndpointAbstract' => $baseDir . '/src/Conversion/Endpoint/EndpointAbstract.php',
    'WebpConverter\\Conversion\\Endpoint\\EndpointIntegration' => $baseDir . '/src/Conversion/Endpoint/EndpointIntegration.php',
    'WebpConverter\\Conversion\\Endpoint\\EndpointInterface' => $baseDir . '/src/Conversion/Endpoint/EndpointInterface.php',
    'WebpConverter\\Conversion\\Endpoint\\PathsEndpoint' => $baseDir . '/src/Conversion/Endpoint/PathsEndpoint.php',
    'WebpConverter\\Conversion\\Endpoint\\RegenerateEndpoint' => $baseDir . '/src/Conversion/Endpoint/RegenerateEndpoint.php',
    'WebpConverter\\Conversion\\Endpoints' => $baseDir . '/src/Conversion/Endpoints.php',
    'WebpConverter\\Conversion\\Exception\\ConversionErrorException' => $baseDir . '/src/Conversion/Exception/ConversionErrorException.php',
    'WebpConverter\\Conversion\\Exception\\ExceptionAbstract' => $baseDir . '/src/Conversion/Exception/ExceptionAbstract.php',
    'WebpConverter\\Conversion\\Exception\\ExceptionInterface' => $baseDir . '/src/Conversion/Exception/ExceptionInterface.php',
    'WebpConverter\\Conversion\\Exception\\ExtensionUnsupportedException' => $baseDir . '/src/Conversion/Exception/ExtensionUnsupportedException.php',
    'WebpConverter\\Conversion\\Exception\\FunctionUnavailableException' => $baseDir . '/src/Conversion/Exception/FunctionUnavailableException.php',
    'WebpConverter\\Conversion\\Exception\\ImageInvalidException' => $baseDir . '/src/Conversion/Exception/ImageInvalidException.php',
    'WebpConverter\\Conversion\\Exception\\ImagickNotSupportWebpException' => $baseDir . '/src/Conversion/Exception/ImagickNotSupportWebpException.php',
    'WebpConverter\\Conversion\\Exception\\ImagickUnavailableException' => $baseDir . '/src/Conversion/Exception/ImagickUnavailableException.php',
    'WebpConverter\\Conversion\\Exception\\LargerThanOriginalException' => $baseDir . '/src/Conversion/Exception/LargerThanOriginalException.php',
    'WebpConverter\\Conversion\\Exception\\OutputPathException' => $baseDir . '/src/Conversion/Exception/OutputPathException.php',
    'WebpConverter\\Conversion\\Exception\\ResolutionOversizeException' => $baseDir . '/src/Conversion/Exception/ResolutionOversizeException.php',
    'WebpConverter\\Conversion\\Exception\\ServerConfigurationException' => $baseDir . '/src/Conversion/Exception/ServerConfigurationException.php',
    'WebpConverter\\Conversion\\Exception\\SourcePathException' => $baseDir . '/src/Conversion/Exception/SourcePathException.php',
    'WebpConverter\\Conversion\\Format\\AvifFormat' => $baseDir . '/src/Conversion/Format/AvifFormat.php',
    'WebpConverter\\Conversion\\Format\\FormatAbstract' => $baseDir . '/src/Conversion/Format/FormatAbstract.php',
    'WebpConverter\\Conversion\\Format\\FormatInterface' => $baseDir . '/src/Conversion/Format/FormatInterface.php',
    'WebpConverter\\Conversion\\Format\\WebpFormat' => $baseDir . '/src/Conversion/Format/WebpFormat.php',
    'WebpConverter\\Conversion\\Formats' => $baseDir . '/src/Conversion/Formats.php',
    'WebpConverter\\Conversion\\Media\\Attachment' => $baseDir . '/src/Conversion/Media/Attachment.php',
    'WebpConverter\\Conversion\\Media\\Delete' => $baseDir . '/src/Conversion/Media/Delete.php',
    'WebpConverter\\Conversion\\Media\\Upload' => $baseDir . '/src/Conversion/Media/Upload.php',
    'WebpConverter\\Conversion\\Method\\GdMethod' => $baseDir . '/src/Conversion/Method/GdMethod.php',
    'WebpConverter\\Conversion\\Method\\ImagickMethod' => $baseDir . '/src/Conversion/Method/ImagickMethod.php',
    'WebpConverter\\Conversion\\Method\\MethodAbstract' => $baseDir . '/src/Conversion/Method/MethodAbstract.php',
    'WebpConverter\\Conversion\\Method\\MethodIntegrator' => $baseDir . '/src/Conversion/Method/MethodIntegrator.php',
    'WebpConverter\\Conversion\\Method\\MethodInterface' => $baseDir . '/src/Conversion/Method/MethodInterface.php',
    'WebpConverter\\Conversion\\Methods' => $baseDir . '/src/Conversion/Methods.php',
    'WebpConverter\\Conversion\\OutputPath' => $baseDir . '/src/Conversion/OutputPath.php',
    'WebpConverter\\Conversion\\SkipExists' => $baseDir . '/src/Conversion/SkipExists.php',
    'WebpConverter\\Conversion\\SkipLarger' => $baseDir . '/src/Conversion/SkipLarger.php',
    'WebpConverter\\Error\\ErrorAbstract' => $baseDir . '/src/Error/ErrorAbstract.php',
    'WebpConverter\\Error\\ErrorInterface' => $baseDir . '/src/Error/ErrorInterface.php',
    'WebpConverter\\Error\\Errors' => $baseDir . '/src/Error/Errors.php',
    'WebpConverter\\Error\\LibsInstalledError' => $baseDir . '/src/Error/LibsInstalledError.php',
    'WebpConverter\\Error\\LibsSupportAvifError' => $baseDir . '/src/Error/LibsSupportAvifError.php',
    'WebpConverter\\Error\\LibsSupportWebpError' => $baseDir . '/src/Error/LibsSupportWebpError.php',
    'WebpConverter\\Error\\PassthruError' => $baseDir . '/src/Error/PassthruError.php',
    'WebpConverter\\Error\\PathsError' => $baseDir . '/src/Error/PathsError.php',
    'WebpConverter\\Error\\RestapiError' => $baseDir . '/src/Error/RestapiError.php',
    'WebpConverter\\Error\\RewritesError' => $baseDir . '/src/Error/RewritesError.php',
    'WebpConverter\\Error\\SettingsError' => $baseDir . '/src/Error/SettingsError.php',
    'WebpConverter\\Helper\\FileLoader' => $baseDir . '/src/Helper/FileLoader.php',
    'WebpConverter\\Helper\\ViewLoader' => $baseDir . '/src/Helper/ViewLoader.php',
    'WebpConverter\\HookableInterface' => $baseDir . '/src/HookableInterface.php',
    'WebpConverter\\Loader\\HtaccessLoader' => $baseDir . '/src/Loader/HtaccessLoader.php',
    'WebpConverter\\Loader\\LoaderAbstract' => $baseDir . '/src/Loader/LoaderAbstract.php',
    'WebpConverter\\Loader\\LoaderIntegration' => $baseDir . '/src/Loader/LoaderIntegration.php',
    'WebpConverter\\Loader\\LoaderInterface' => $baseDir . '/src/Loader/LoaderInterface.php',
    'WebpConverter\\Loader\\Loaders' => $baseDir . '/src/Loader/Loaders.php',
    'WebpConverter\\Loader\\PassthruLoader' => $baseDir . '/src/Loader/PassthruLoader.php',
    'WebpConverter\\Notice\\NoticeAbstract' => $baseDir . '/src/Notice/NoticeAbstract.php',
    'WebpConverter\\Notice\\NoticeIntegration' => $baseDir . '/src/Notice/NoticeIntegration.php',
    'WebpConverter\\Notice\\NoticeInterface' => $baseDir . '/src/Notice/NoticeInterface.php',
    'WebpConverter\\Notice\\Notices' => $baseDir . '/src/Notice/Notices.php',
    'WebpConverter\\Notice\\ThanksNotice' => $baseDir . '/src/Notice/ThanksNotice.php',
    'WebpConverter\\Notice\\WelcomeNotice' => $baseDir . '/src/Notice/WelcomeNotice.php',
    'WebpConverter\\PluginAccessAbstract' => $baseDir . '/src/PluginAccessAbstract.php',
    'WebpConverter\\PluginAccessInterface' => $baseDir . '/src/PluginAccessInterface.php',
    'WebpConverter\\Plugin\\Activation' => $baseDir . '/src/Plugin/Activation.php',
    'WebpConverter\\Plugin\\Activation\\DefaultSettings' => $baseDir . '/src/Plugin/Activation/DefaultSettings.php',
    'WebpConverter\\Plugin\\Activation\\RefreshLoader' => $baseDir . '/src/Plugin/Activation/RefreshLoader.php',
    'WebpConverter\\Plugin\\Activation\\WebpDirectory' => $baseDir . '/src/Plugin/Activation/WebpDirectory.php',
    'WebpConverter\\Plugin\\Deactivation' => $baseDir . '/src/Plugin/Deactivation.php',
    'WebpConverter\\Plugin\\Deactivation\\CronReset' => $baseDir . '/src/Plugin/Deactivation/CronReset.php',
    'WebpConverter\\Plugin\\Deactivation\\Modal' => $baseDir . '/src/Plugin/Deactivation/Modal.php',
    'WebpConverter\\Plugin\\Deactivation\\RefreshLoader' => $baseDir . '/src/Plugin/Deactivation/RefreshLoader.php',
    'WebpConverter\\Plugin\\Links' => $baseDir . '/src/Plugin/Links.php',
    'WebpConverter\\Plugin\\Uninstall' => $baseDir . '/src/Plugin/Uninstall.php',
    'WebpConverter\\Plugin\\Uninstall\\DebugFiles' => $baseDir . '/src/Plugin/Uninstall/DebugFiles.php',
    'WebpConverter\\Plugin\\Uninstall\\HtaccessFile' => $baseDir . '/src/Plugin/Uninstall/HtaccessFile.php',
    'WebpConverter\\Plugin\\Uninstall\\PluginSettings' => $baseDir . '/src/Plugin/Uninstall/PluginSettings.php',
    'WebpConverter\\Plugin\\Uninstall\\WebpFiles' => $baseDir . '/src/Plugin/Uninstall/WebpFiles.php',
    'WebpConverter\\Plugin\\Update' => $baseDir . '/src/Plugin/Update.php',
    'WebpConverter\\Settings\\AdminAssets' => $baseDir . '/src/Settings/AdminAssets.php',
    'WebpConverter\\Settings\\Option\\ConversionMethodOption' => $baseDir . '/src/Settings/Option/ConversionMethodOption.php',
    'WebpConverter\\Settings\\Option\\ExtraFeaturesOption' => $baseDir . '/src/Settings/Option/ExtraFeaturesOption.php',
    'WebpConverter\\Settings\\Option\\ImagesQualityOption' => $baseDir . '/src/Settings/Option/ImagesQualityOption.php',
    'WebpConverter\\Settings\\Option\\LoaderTypeOption' => $baseDir . '/src/Settings/Option/LoaderTypeOption.php',
    'WebpConverter\\Settings\\Option\\OptionAbstract' => $baseDir . '/src/Settings/Option/OptionAbstract.php',
    'WebpConverter\\Settings\\Option\\OptionIntegration' => $baseDir . '/src/Settings/Option/OptionIntegration.php',
    'WebpConverter\\Settings\\Option\\OptionInterface' => $baseDir . '/src/Settings/Option/OptionInterface.php',
    'WebpConverter\\Settings\\Option\\OutputFormatsOption' => $baseDir . '/src/Settings/Option/OutputFormatsOption.php',
    'WebpConverter\\Settings\\Option\\SupportedDirectoriesOption' => $baseDir . '/src/Settings/Option/SupportedDirectoriesOption.php',
    'WebpConverter\\Settings\\Option\\SupportedExtensionsOption' => $baseDir . '/src/Settings/Option/SupportedExtensionsOption.php',
    'WebpConverter\\Settings\\Options' => $baseDir . '/src/Settings/Options.php',
    'WebpConverter\\Settings\\Page\\DebugPage' => $baseDir . '/src/Settings/Page/DebugPage.php',
    'WebpConverter\\Settings\\Page\\PageAbstract' => $baseDir . '/src/Settings/Page/PageAbstract.php',
    'WebpConverter\\Settings\\Page\\PageInterface' => $baseDir . '/src/Settings/Page/PageInterface.php',
    'WebpConverter\\Settings\\Page\\SettingsPage' => $baseDir . '/src/Settings/Page/SettingsPage.php',
    'WebpConverter\\Settings\\Pages' => $baseDir . '/src/Settings/Pages.php',
    'WebpConverter\\Settings\\SettingsSave' => $baseDir . '/src/Settings/SettingsSave.php',
    'WebpConverter\\WebpConverter' => $baseDir . '/src/WebpConverter.php',
);
