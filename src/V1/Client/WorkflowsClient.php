<?php
/*
 * Copyright 2024 Google LLC
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *     https://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

/*
 * GENERATED CODE WARNING
 * Generated by gapic-generator-php from the file
 * https://github.com/googleapis/googleapis/blob/master/google/cloud/workflows/v1/workflows.proto
 * Updates to the above are reflected here through a refresh process.
 */

namespace Google\Cloud\Workflows\V1\Client;

use Google\ApiCore\ApiException;
use Google\ApiCore\CredentialsWrapper;
use Google\ApiCore\GapicClientTrait;
use Google\ApiCore\OperationResponse;
use Google\ApiCore\PagedListResponse;
use Google\ApiCore\ResourceHelperTrait;
use Google\ApiCore\RetrySettings;
use Google\ApiCore\Transport\TransportInterface;
use Google\ApiCore\ValidationException;
use Google\Auth\FetchAuthTokenInterface;
use Google\Cloud\Location\GetLocationRequest;
use Google\Cloud\Location\ListLocationsRequest;
use Google\Cloud\Location\Location;
use Google\Cloud\Workflows\V1\CreateWorkflowRequest;
use Google\Cloud\Workflows\V1\DeleteWorkflowRequest;
use Google\Cloud\Workflows\V1\GetWorkflowRequest;
use Google\Cloud\Workflows\V1\ListWorkflowsRequest;
use Google\Cloud\Workflows\V1\UpdateWorkflowRequest;
use Google\Cloud\Workflows\V1\Workflow;
use Google\LongRunning\Client\OperationsClient;
use Google\LongRunning\Operation;
use GuzzleHttp\Promise\PromiseInterface;
use Psr\Log\LoggerInterface;

/**
 * Service Description: Workflows is used to deploy and execute workflow programs.
 * Workflows makes sure the program executes reliably, despite hardware and
 * networking interruptions.
 *
 * This class provides the ability to make remote calls to the backing service through method
 * calls that map to API methods.
 *
 * Many parameters require resource names to be formatted in a particular way. To
 * assist with these names, this class includes a format method for each type of
 * name, and additionally a parseName method to extract the individual identifiers
 * contained within formatted names that are returned by the API.
 *
 * @method PromiseInterface<OperationResponse> createWorkflowAsync(CreateWorkflowRequest $request, array $optionalArgs = [])
 * @method PromiseInterface<OperationResponse> deleteWorkflowAsync(DeleteWorkflowRequest $request, array $optionalArgs = [])
 * @method PromiseInterface<Workflow> getWorkflowAsync(GetWorkflowRequest $request, array $optionalArgs = [])
 * @method PromiseInterface<PagedListResponse> listWorkflowsAsync(ListWorkflowsRequest $request, array $optionalArgs = [])
 * @method PromiseInterface<OperationResponse> updateWorkflowAsync(UpdateWorkflowRequest $request, array $optionalArgs = [])
 * @method PromiseInterface<Location> getLocationAsync(GetLocationRequest $request, array $optionalArgs = [])
 * @method PromiseInterface<PagedListResponse> listLocationsAsync(ListLocationsRequest $request, array $optionalArgs = [])
 */
final class WorkflowsClient
{
    use GapicClientTrait;
    use ResourceHelperTrait;

    /** The name of the service. */
    private const SERVICE_NAME = 'google.cloud.workflows.v1.Workflows';

    /**
     * The default address of the service.
     *
     * @deprecated SERVICE_ADDRESS_TEMPLATE should be used instead.
     */
    private const SERVICE_ADDRESS = 'workflows.googleapis.com';

    /** The address template of the service. */
    private const SERVICE_ADDRESS_TEMPLATE = 'workflows.UNIVERSE_DOMAIN';

    /** The default port of the service. */
    private const DEFAULT_SERVICE_PORT = 443;

    /** The name of the code generator, to be included in the agent header. */
    private const CODEGEN_NAME = 'gapic';

    /** The default scopes required by the service. */
    public static $serviceScopes = [
        'https://www.googleapis.com/auth/cloud-platform',
    ];

    private $operationsClient;

    private static function getClientDefaults()
    {
        return [
            'serviceName' => self::SERVICE_NAME,
            'apiEndpoint' => self::SERVICE_ADDRESS . ':' . self::DEFAULT_SERVICE_PORT,
            'clientConfig' => __DIR__ . '/../resources/workflows_client_config.json',
            'descriptorsConfigPath' => __DIR__ . '/../resources/workflows_descriptor_config.php',
            'gcpApiConfigPath' => __DIR__ . '/../resources/workflows_grpc_config.json',
            'credentialsConfig' => [
                'defaultScopes' => self::$serviceScopes,
            ],
            'transportConfig' => [
                'rest' => [
                    'restClientConfigPath' => __DIR__ . '/../resources/workflows_rest_client_config.php',
                ],
            ],
        ];
    }

    /**
     * Return an OperationsClient object with the same endpoint as $this.
     *
     * @return OperationsClient
     */
    public function getOperationsClient()
    {
        return $this->operationsClient;
    }

    /**
     * Resume an existing long running operation that was previously started by a long
     * running API method. If $methodName is not provided, or does not match a long
     * running API method, then the operation can still be resumed, but the
     * OperationResponse object will not deserialize the final response.
     *
     * @param string $operationName The name of the long running operation
     * @param string $methodName    The name of the method used to start the operation
     *
     * @return OperationResponse
     */
    public function resumeOperation($operationName, $methodName = null)
    {
        $options = isset($this->descriptors[$methodName]['longRunning']) ? $this->descriptors[$methodName]['longRunning'] : [];
        $operation = new OperationResponse($operationName, $this->getOperationsClient(), $options);
        $operation->reload();
        return $operation;
    }

    /**
     * Create the default operation client for the service.
     *
     * @param array $options ClientOptions for the client.
     *
     * @return OperationsClient
     */
    private function createOperationsClient(array $options)
    {
        // Unset client-specific configuration options
        unset($options['serviceName'], $options['clientConfig'], $options['descriptorsConfigPath']);

        if (isset($options['operationsClient'])) {
            return $options['operationsClient'];
        }

        return new OperationsClient($options);
    }

    /**
     * Formats a string containing the fully-qualified path to represent a crypto_key
     * resource.
     *
     * @param string $project
     * @param string $location
     * @param string $keyRing
     * @param string $cryptoKey
     *
     * @return string The formatted crypto_key resource.
     */
    public static function cryptoKeyName(string $project, string $location, string $keyRing, string $cryptoKey): string
    {
        return self::getPathTemplate('cryptoKey')->render([
            'project' => $project,
            'location' => $location,
            'keyRing' => $keyRing,
            'cryptoKey' => $cryptoKey,
        ]);
    }

    /**
     * Formats a string containing the fully-qualified path to represent a location
     * resource.
     *
     * @param string $project
     * @param string $location
     *
     * @return string The formatted location resource.
     */
    public static function locationName(string $project, string $location): string
    {
        return self::getPathTemplate('location')->render([
            'project' => $project,
            'location' => $location,
        ]);
    }

    /**
     * Formats a string containing the fully-qualified path to represent a workflow
     * resource.
     *
     * @param string $project
     * @param string $location
     * @param string $workflow
     *
     * @return string The formatted workflow resource.
     */
    public static function workflowName(string $project, string $location, string $workflow): string
    {
        return self::getPathTemplate('workflow')->render([
            'project' => $project,
            'location' => $location,
            'workflow' => $workflow,
        ]);
    }

    /**
     * Parses a formatted name string and returns an associative array of the components in the name.
     * The following name formats are supported:
     * Template: Pattern
     * - cryptoKey: projects/{project}/locations/{location}/keyRings/{keyRing}/cryptoKeys/{cryptoKey}
     * - location: projects/{project}/locations/{location}
     * - workflow: projects/{project}/locations/{location}/workflows/{workflow}
     *
     * The optional $template argument can be supplied to specify a particular pattern,
     * and must match one of the templates listed above. If no $template argument is
     * provided, or if the $template argument does not match one of the templates
     * listed, then parseName will check each of the supported templates, and return
     * the first match.
     *
     * @param string  $formattedName The formatted name string
     * @param ?string $template      Optional name of template to match
     *
     * @return array An associative array from name component IDs to component values.
     *
     * @throws ValidationException If $formattedName could not be matched.
     */
    public static function parseName(string $formattedName, ?string $template = null): array
    {
        return self::parseFormattedName($formattedName, $template);
    }

    /**
     * Constructor.
     *
     * @param array $options {
     *     Optional. Options for configuring the service API wrapper.
     *
     *     @type string $apiEndpoint
     *           The address of the API remote host. May optionally include the port, formatted
     *           as "<uri>:<port>". Default 'workflows.googleapis.com:443'.
     *     @type string|array|FetchAuthTokenInterface|CredentialsWrapper $credentials
     *           The credentials to be used by the client to authorize API calls. This option
     *           accepts either a path to a credentials file, or a decoded credentials file as a
     *           PHP array.
     *           *Advanced usage*: In addition, this option can also accept a pre-constructed
     *           {@see \Google\Auth\FetchAuthTokenInterface} object or
     *           {@see \Google\ApiCore\CredentialsWrapper} object. Note that when one of these
     *           objects are provided, any settings in $credentialsConfig will be ignored.
     *     @type array $credentialsConfig
     *           Options used to configure credentials, including auth token caching, for the
     *           client. For a full list of supporting configuration options, see
     *           {@see \Google\ApiCore\CredentialsWrapper::build()} .
     *     @type bool $disableRetries
     *           Determines whether or not retries defined by the client configuration should be
     *           disabled. Defaults to `false`.
     *     @type string|array $clientConfig
     *           Client method configuration, including retry settings. This option can be either
     *           a path to a JSON file, or a PHP array containing the decoded JSON data. By
     *           default this settings points to the default client config file, which is
     *           provided in the resources folder.
     *     @type string|TransportInterface $transport
     *           The transport used for executing network requests. May be either the string
     *           `rest` or `grpc`. Defaults to `grpc` if gRPC support is detected on the system.
     *           *Advanced usage*: Additionally, it is possible to pass in an already
     *           instantiated {@see \Google\ApiCore\Transport\TransportInterface} object. Note
     *           that when this object is provided, any settings in $transportConfig, and any
     *           $apiEndpoint setting, will be ignored.
     *     @type array $transportConfig
     *           Configuration options that will be used to construct the transport. Options for
     *           each supported transport type should be passed in a key for that transport. For
     *           example:
     *           $transportConfig = [
     *               'grpc' => [...],
     *               'rest' => [...],
     *           ];
     *           See the {@see \Google\ApiCore\Transport\GrpcTransport::build()} and
     *           {@see \Google\ApiCore\Transport\RestTransport::build()} methods for the
     *           supported options.
     *     @type callable $clientCertSource
     *           A callable which returns the client cert as a string. This can be used to
     *           provide a certificate and private key to the transport layer for mTLS.
     *     @type false|LoggerInterface $logger
     *           A PSR-3 compliant logger. If set to false, logging is disabled, ignoring the
     *           'GOOGLE_SDK_PHP_LOGGING' environment flag
     * }
     *
     * @throws ValidationException
     */
    public function __construct(array $options = [])
    {
        $clientOptions = $this->buildClientOptions($options);
        $this->setClientOptions($clientOptions);
        $this->operationsClient = $this->createOperationsClient($clientOptions);
    }

    /** Handles execution of the async variants for each documented method. */
    public function __call($method, $args)
    {
        if (substr($method, -5) !== 'Async') {
            trigger_error('Call to undefined method ' . __CLASS__ . "::$method()", E_USER_ERROR);
        }

        array_unshift($args, substr($method, 0, -5));
        return call_user_func_array([$this, 'startAsyncCall'], $args);
    }

    /**
     * Creates a new workflow. If a workflow with the specified name already
     * exists in the specified project and location, the long running operation
     * returns a [ALREADY_EXISTS][google.rpc.Code.ALREADY_EXISTS] error.
     *
     * The async variant is {@see WorkflowsClient::createWorkflowAsync()} .
     *
     * @example samples/V1/WorkflowsClient/create_workflow.php
     *
     * @param CreateWorkflowRequest $request     A request to house fields associated with the call.
     * @param array                 $callOptions {
     *     Optional.
     *
     *     @type RetrySettings|array $retrySettings
     *           Retry settings to use for this call. Can be a {@see RetrySettings} object, or an
     *           associative array of retry settings parameters. See the documentation on
     *           {@see RetrySettings} for example usage.
     * }
     *
     * @return OperationResponse
     *
     * @throws ApiException Thrown if the API call fails.
     */
    public function createWorkflow(CreateWorkflowRequest $request, array $callOptions = []): OperationResponse
    {
        return $this->startApiCall('CreateWorkflow', $request, $callOptions)->wait();
    }

    /**
     * Deletes a workflow with the specified name.
     * This method also cancels and deletes all running executions of the
     * workflow.
     *
     * The async variant is {@see WorkflowsClient::deleteWorkflowAsync()} .
     *
     * @example samples/V1/WorkflowsClient/delete_workflow.php
     *
     * @param DeleteWorkflowRequest $request     A request to house fields associated with the call.
     * @param array                 $callOptions {
     *     Optional.
     *
     *     @type RetrySettings|array $retrySettings
     *           Retry settings to use for this call. Can be a {@see RetrySettings} object, or an
     *           associative array of retry settings parameters. See the documentation on
     *           {@see RetrySettings} for example usage.
     * }
     *
     * @return OperationResponse
     *
     * @throws ApiException Thrown if the API call fails.
     */
    public function deleteWorkflow(DeleteWorkflowRequest $request, array $callOptions = []): OperationResponse
    {
        return $this->startApiCall('DeleteWorkflow', $request, $callOptions)->wait();
    }

    /**
     * Gets details of a single workflow.
     *
     * The async variant is {@see WorkflowsClient::getWorkflowAsync()} .
     *
     * @example samples/V1/WorkflowsClient/get_workflow.php
     *
     * @param GetWorkflowRequest $request     A request to house fields associated with the call.
     * @param array              $callOptions {
     *     Optional.
     *
     *     @type RetrySettings|array $retrySettings
     *           Retry settings to use for this call. Can be a {@see RetrySettings} object, or an
     *           associative array of retry settings parameters. See the documentation on
     *           {@see RetrySettings} for example usage.
     * }
     *
     * @return Workflow
     *
     * @throws ApiException Thrown if the API call fails.
     */
    public function getWorkflow(GetWorkflowRequest $request, array $callOptions = []): Workflow
    {
        return $this->startApiCall('GetWorkflow', $request, $callOptions)->wait();
    }

    /**
     * Lists workflows in a given project and location.
     * The default order is not specified.
     *
     * The async variant is {@see WorkflowsClient::listWorkflowsAsync()} .
     *
     * @example samples/V1/WorkflowsClient/list_workflows.php
     *
     * @param ListWorkflowsRequest $request     A request to house fields associated with the call.
     * @param array                $callOptions {
     *     Optional.
     *
     *     @type RetrySettings|array $retrySettings
     *           Retry settings to use for this call. Can be a {@see RetrySettings} object, or an
     *           associative array of retry settings parameters. See the documentation on
     *           {@see RetrySettings} for example usage.
     * }
     *
     * @return PagedListResponse
     *
     * @throws ApiException Thrown if the API call fails.
     */
    public function listWorkflows(ListWorkflowsRequest $request, array $callOptions = []): PagedListResponse
    {
        return $this->startApiCall('ListWorkflows', $request, $callOptions);
    }

    /**
     * Updates an existing workflow.
     * Running this method has no impact on already running executions of the
     * workflow. A new revision of the workflow might be created as a result of a
     * successful update operation. In that case, the new revision is used
     * in new workflow executions.
     *
     * The async variant is {@see WorkflowsClient::updateWorkflowAsync()} .
     *
     * @example samples/V1/WorkflowsClient/update_workflow.php
     *
     * @param UpdateWorkflowRequest $request     A request to house fields associated with the call.
     * @param array                 $callOptions {
     *     Optional.
     *
     *     @type RetrySettings|array $retrySettings
     *           Retry settings to use for this call. Can be a {@see RetrySettings} object, or an
     *           associative array of retry settings parameters. See the documentation on
     *           {@see RetrySettings} for example usage.
     * }
     *
     * @return OperationResponse
     *
     * @throws ApiException Thrown if the API call fails.
     */
    public function updateWorkflow(UpdateWorkflowRequest $request, array $callOptions = []): OperationResponse
    {
        return $this->startApiCall('UpdateWorkflow', $request, $callOptions)->wait();
    }

    /**
     * Gets information about a location.
     *
     * The async variant is {@see WorkflowsClient::getLocationAsync()} .
     *
     * @example samples/V1/WorkflowsClient/get_location.php
     *
     * @param GetLocationRequest $request     A request to house fields associated with the call.
     * @param array              $callOptions {
     *     Optional.
     *
     *     @type RetrySettings|array $retrySettings
     *           Retry settings to use for this call. Can be a {@see RetrySettings} object, or an
     *           associative array of retry settings parameters. See the documentation on
     *           {@see RetrySettings} for example usage.
     * }
     *
     * @return Location
     *
     * @throws ApiException Thrown if the API call fails.
     */
    public function getLocation(GetLocationRequest $request, array $callOptions = []): Location
    {
        return $this->startApiCall('GetLocation', $request, $callOptions)->wait();
    }

    /**
     * Lists information about the supported locations for this service.
     *
     * The async variant is {@see WorkflowsClient::listLocationsAsync()} .
     *
     * @example samples/V1/WorkflowsClient/list_locations.php
     *
     * @param ListLocationsRequest $request     A request to house fields associated with the call.
     * @param array                $callOptions {
     *     Optional.
     *
     *     @type RetrySettings|array $retrySettings
     *           Retry settings to use for this call. Can be a {@see RetrySettings} object, or an
     *           associative array of retry settings parameters. See the documentation on
     *           {@see RetrySettings} for example usage.
     * }
     *
     * @return PagedListResponse
     *
     * @throws ApiException Thrown if the API call fails.
     */
    public function listLocations(ListLocationsRequest $request, array $callOptions = []): PagedListResponse
    {
        return $this->startApiCall('ListLocations', $request, $callOptions);
    }
}
