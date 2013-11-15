<?php
/** @package    IT350::Controller */

/** import supporting libraries */
require_once("AppBaseController.php");
require_once("Model/License.php");

/**
 * LicenseController is the controller class for the License object.  The
 * controller is responsible for processing input from the user, reading/updating
 * the model as necessary and displaying the appropriate view.
 *
 * @package IT350::Controller
 * @author ClassBuilder
 * @version 1.0
 */
class LicenseController extends AppBaseController
{

	/**
	 * Override here for any controller-specific functionality
	 *
	 * @inheritdocs
	 */
	protected function Init()
	{
		parent::Init();

		// TODO: add controller-wide bootstrap code
		
		// TODO: if authentiation is required for this entire controller, for example:
		// $this->RequirePermission(ExampleUser::$PERMISSION_USER,'SecureExample.LoginForm');
	}

	/**
	 * Displays a list view of License objects
	 */
	public function ListView()
	{
		$this->Render();
	}

	/**
	 * API Method queries for License records and render as JSON
	 */
	public function Query()
	{
		try
		{
			$criteria = new LicenseCriteria();
			
			// TODO: this will limit results based on all properties included in the filter list 
			$filter = RequestUtil::Get('filter');
			if ($filter) $criteria->AddFilter(
				new CriteriaFilter('LicensesId,LicenseKey,NumberTimesActivated,MaxActivation,LicenseName,LicenseExpirationDate,ComputersId'
				, '%'.$filter.'%')
			);

			// TODO: this is generic query filtering based only on criteria properties
			foreach (array_keys($_REQUEST) as $prop)
			{
				$prop_normal = ucfirst($prop);
				$prop_equals = $prop_normal.'_Equals';

				if (property_exists($criteria, $prop_normal))
				{
					$criteria->$prop_normal = RequestUtil::Get($prop);
				}
				elseif (property_exists($criteria, $prop_equals))
				{
					// this is a convenience so that the _Equals suffix is not needed
					$criteria->$prop_equals = RequestUtil::Get($prop);
				}
			}

			$output = new stdClass();

			// if a sort order was specified then specify in the criteria
 			$output->orderBy = RequestUtil::Get('orderBy');
 			$output->orderDesc = RequestUtil::Get('orderDesc') != '';
 			if ($output->orderBy) $criteria->SetOrder($output->orderBy, $output->orderDesc);

			$page = RequestUtil::Get('page');

			if ($page != '')
			{
				// if page is specified, use this instead (at the expense of one extra count query)
				$pagesize = $this->GetDefaultPageSize();

				$licenses = $this->Phreezer->Query('License',$criteria)->GetDataPage($page, $pagesize);
				$output->rows = $licenses->ToObjectArray(true,$this->SimpleObjectParams());
				$output->totalResults = $licenses->TotalResults;
				$output->totalPages = $licenses->TotalPages;
				$output->pageSize = $licenses->PageSize;
				$output->currentPage = $licenses->CurrentPage;
			}
			else
			{
				// return all results
				$licenses = $this->Phreezer->Query('License',$criteria);
				$output->rows = $licenses->ToObjectArray(true, $this->SimpleObjectParams());
				$output->totalResults = count($output->rows);
				$output->totalPages = 1;
				$output->pageSize = $output->totalResults;
				$output->currentPage = 1;
			}


			$this->RenderJSON($output, $this->JSONPCallback());
		}
		catch (Exception $ex)
		{
			$this->RenderExceptionJSON($ex);
		}
	}

	/**
	 * API Method retrieves a single License record and render as JSON
	 */
	public function Read()
	{
		try
		{
			$pk = $this->GetRouter()->GetUrlParam('licensesId');
			$license = $this->Phreezer->Get('License',$pk);
			$this->RenderJSON($license, $this->JSONPCallback(), true, $this->SimpleObjectParams());
		}
		catch (Exception $ex)
		{
			$this->RenderExceptionJSON($ex);
		}
	}

	/**
	 * API Method inserts a new License record and render response as JSON
	 */
	public function Create()
	{
		try
		{
						
			$json = json_decode(RequestUtil::GetBody());

			if (!$json)
			{
				throw new Exception('The request body does not contain valid JSON');
			}

			$license = new License($this->Phreezer);

			// TODO: any fields that should not be inserted by the user should be commented out

			// this is an auto-increment.  uncomment if updating is allowed
			// $license->LicensesId = $this->SafeGetVal($json, 'licensesId');

			$license->LicenseKey = $this->SafeGetVal($json, 'licenseKey');
			$license->NumberTimesActivated = $this->SafeGetVal($json, 'numberTimesActivated');
			$license->MaxActivation = $this->SafeGetVal($json, 'maxActivation');
			$license->LicenseName = $this->SafeGetVal($json, 'licenseName');
			$license->LicenseExpirationDate = date('Y-m-d H:i:s',strtotime($this->SafeGetVal($json, 'licenseExpirationDate')));
			$license->ComputersId = $this->SafeGetVal($json, 'computersId');

			$license->Validate();
			$errors = $license->GetValidationErrors();

			if (count($errors) > 0)
			{
				$this->RenderErrorJSON('Please check the form for errors',$errors);
			}
			else
			{
				$license->Save();
				$this->RenderJSON($license, $this->JSONPCallback(), true, $this->SimpleObjectParams());
			}

		}
		catch (Exception $ex)
		{
			$this->RenderExceptionJSON($ex);
		}
	}

	/**
	 * API Method updates an existing License record and render response as JSON
	 */
	public function Update()
	{
		try
		{
						
			$json = json_decode(RequestUtil::GetBody());

			if (!$json)
			{
				throw new Exception('The request body does not contain valid JSON');
			}

			$pk = $this->GetRouter()->GetUrlParam('licensesId');
			$license = $this->Phreezer->Get('License',$pk);

			// TODO: any fields that should not be updated by the user should be commented out

			// this is a primary key.  uncomment if updating is allowed
			// $license->LicensesId = $this->SafeGetVal($json, 'licensesId', $license->LicensesId);

			$license->LicenseKey = $this->SafeGetVal($json, 'licenseKey', $license->LicenseKey);
			$license->NumberTimesActivated = $this->SafeGetVal($json, 'numberTimesActivated', $license->NumberTimesActivated);
			$license->MaxActivation = $this->SafeGetVal($json, 'maxActivation', $license->MaxActivation);
			$license->LicenseName = $this->SafeGetVal($json, 'licenseName', $license->LicenseName);
			$license->LicenseExpirationDate = date('Y-m-d H:i:s',strtotime($this->SafeGetVal($json, 'licenseExpirationDate', $license->LicenseExpirationDate)));
			$license->ComputersId = $this->SafeGetVal($json, 'computersId', $license->ComputersId);

			$license->Validate();
			$errors = $license->GetValidationErrors();

			if (count($errors) > 0)
			{
				$this->RenderErrorJSON('Please check the form for errors',$errors);
			}
			else
			{
				$license->Save();
				$this->RenderJSON($license, $this->JSONPCallback(), true, $this->SimpleObjectParams());
			}


		}
		catch (Exception $ex)
		{


			$this->RenderExceptionJSON($ex);
		}
	}

	/**
	 * API Method deletes an existing License record and render response as JSON
	 */
	public function Delete()
	{
		try
		{
						
			// TODO: if a soft delete is prefered, change this to update the deleted flag instead of hard-deleting

			$pk = $this->GetRouter()->GetUrlParam('licensesId');
			$license = $this->Phreezer->Get('License',$pk);

			$license->Delete();

			$output = new stdClass();

			$this->RenderJSON($output, $this->JSONPCallback());

		}
		catch (Exception $ex)
		{
			$this->RenderExceptionJSON($ex);
		}
	}
}

?>
