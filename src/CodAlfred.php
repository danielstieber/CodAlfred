<?php
namespace danielstieber\CodAlfred;

use Alfred\Workflows\Workflow;
use CodaPHP\CodaPHP;

/**
 * CodAlfred Workflow
 * 
 * CodAlfred is a basic workflow to open Docs from Coda (https://www.coda.io) with Alfred.
 * The workflow uses the CodaPHP library, that is build on the Coda API (Beta) (https://coda.io/developers/apis/v1beta1).
 * The Coda API is still in beta. Use on your own risk.
 * 
 * This file is licensed under the MIT license.
 */
class CodAlfred
{
	/**
	 * @var string $apiToken
	 */
	protected $apiToken;

    /**
     * @var Workflow
     */
    private $workflow;

	/**
	 * Setup the Workflow and access the Coda API via CodaPHP
	 */
	public function __construct($apiToken)
	{
		$this->workflow = new Workflow();
		$this->coda = new CodaPHP($apiToken);
	}

	/**
	 * Searches the Coda doc list based on a the query
	 * 
	 * @param string $query
	 * @return string
	 */
	public function find($query)
	{
		$now = time();
		if(empty(trim($query))) { // if no arg is given
			$result = $this->coda->listDocs(); // get all docs
			$this->workflow->result() // adds option to open coda in browser
				->uid('1') // lowest ID, so it is ranked first
				->title('Open Coda in your Browser')
				->autocomplete('Open Coda in your Browser')
				->subtitle($subtitle)
				->arg('https://coda.io/docs')
				->quicklookurl('https://coda.io/docs')
				->valid(true);
		} else {
			$result = $this->coda->listDocs(['query' => $query]);
		}
		foreach ($result['items'] as $doc) {
			$updated = strtotime($doc['updatedAt']);
			$subtitle = 'Last modified: '.date('d.m.Y h:m', $updated);
			$this->workflow->result()
				->uid($now - $updated) // id is current timestamp - doc timestamp
				->title($doc['name'])
				->autocomplete($doc['name'])
				->subtitle($subtitle)
				->arg($doc['browserLink'])
				->quicklookurl($doc['browserLink'])
				->valid(true);
		}
		$this->workflow->sortResults('asc', 'uid'); // ranks docs with latest update first
        return $this->workflow->output();
	}

	/**
	 * Creates a new Coda Doc
	 * 
	 * @param string $filename
	 * @return string
	 */
	public function create($filename)
	{
		$doc = $this->coda->createDoc($filename);
		$this->workflow->result()
		->uid($doc['id'])
		->title($doc['name'])
		->autocomplete($doc['name'])
		->subtitle($subtitle)
		->arg($doc['browserLink'])
		->quicklookurl($doc['browserLink'])
		->valid(true);
		return $this->workflow->output();
	}
}