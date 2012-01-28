<?php
namespace vespora\controllers\main;

use vespora\controllers\main\BaseController;
use hydrogen\view\View;
use vespora\helpers\viewHelper;


class StatusController extends BaseController {
	

    public function cont() {
       $this->render('100', 'continue');
	}
    public function switchingProtocols() {
        $this->render('101', 'Switching Protocols');
    }
    public function ok() {
        $this->render('200', 'ok');
    }
    public function created() {
        $this->render('201', 'created');
    }
    public function accepted() {
        $this->render('202', 'accepted');
    }
    public function noContent() {
        $this->render('204', 'no content');
    }
    public function partialContent() {
        $this->render('206', 'Partial Content');
    }
    public function multiStatus() {
        $this->render('207', 'Multi-Status');
    }
    public function multipleChoices() {
        $this->render('300', 'Multiple Choices');
    }
    public function movedPermanently() {
        $this->render('301', 'Moved Permanently');
    }
    public function found() {
        $this->render('302', 'Found');
    }
    public function seeOther() {
        $this->render('303', 'See Other');
    }
    public function notModified() {
        $this->render('304', 'Mot Modified');
    }
    public function useProxy() {
        $this->render('305', 'Use Proxy');
    }
    public function temporaryRedirect() {
        $this->render('307', 'Temporary Redirect');
    }
    public function badRequest() {
        $this->render('400', 'Bad Request');
    }
    public function unauthorized() {
        $this->render('401', 'Unauthorized');
    }
    public function paymentRequired() {
        $this->render('402', 'Payment Required');
    }
    public function forbidden() {
        $this->render('403', 'Forbidden');
    }
    public function notFound() {
        $this->render('404', 'notFound');
    }
    public function methodNotAllowed() {
        $this->render('405', 'Method Not Allowed');
    }
    public function notAcceptable() {
        $this->render('406', 'Not Acceptable');
    }
    public function requestTimeout() {
        $this->render('408', 'Request Timeout');
    }
    public function conflict() {
        $this->render('409', 'Conflict');
    }
    public function requestURITooLong() {
        $this->render('414', 'Request-URI Too Long');
    }
    public function gone() {
        $this->render('410', 'Gone');
    }
    public function lengthRequired() {
        $this->render('411', 'Length Required');
    }
    public function requestEntityTooLarge() {
        $this->render('413', 'Request Entity Too Large');
    }
    public function RequestedRangeNotSatisfiable() {
        $this->render('416', 'Requested Range Not Satisfiable');
    }
    public function expectationFailed() {
        $this->render('417', 'Expectation Failed');
    }
    public function teapot() {
        $this->render('418', 'I am a Teapot');
    }
    public function unprocessableEntity() {
        $this->render('422', 'Unprocessable Entity');
    }
    public function locked() {
        $this->render('423', 'Locked');
    }
    public function failedDependency() {
        $this->render('424', 'Failed Dependency');
    }
    public function unorderedCollection() {
        $this->render('425', 'Unordered Collection');
    }
    public function upgradeRequired() {
        $this->render('426', 'Upgrade Required');
    }
    public function tooManyRequest() {
        $this->render('429', 'Too Many Requests');
    }
    public function requestHeaderFieldsTooLarge() {
        $this->render('431', 'Request Header Fields Too Large');
    }
    public function noResponse() {
        $this->render('444', 'No Response');
    }
    public function blockedByWindowsParentalControls() {
        $this->render('450', 'Blocked By Windows Parental Controls');
    }
    public function internalServerError() {
        $this->render('500', 'Internal Server Error');
    }
    public function badGateway() {
        $this->render('502', 'Bad Gateway');
    }
    public function serviceUnavailable() {
        $this->render('503', 'Service Unavailable');
    }
    public function variantAlsoNegotiates() {
        $this->render('506', 'Variant Also Negotiates');
    }
    public function insufficientStorage() {
        $this->render('507', 'Insufficient Storage');
    }
    public function loopDetected() {
        $this->render('508', 'Loop Detected');
    }
    public function bandwidthLimitExceeded() {
        $this->render('509', 'Bandwidth Limit Exceeded');
    }
    public function networkConnectTimeoutError() {
        $this->render('599', 'Network Connect Timeout Error');
    }

    private function render($code, $status){
        header("Status: $code $status", true, $code);
        View::setVar('code', $code);
        View::setVar('status', $status);
        viewHelper::$layout = 'status/content';
    }
}

?>