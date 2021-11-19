<?php

namespace Jaroslavv\Install\Controller;

use Jaroslavv\Framework\Database\Adapter\AdapterInterface;
use Jaroslavv\Framework\Http\Controller\ControllerInterface;
use Jaroslavv\Framework\Http\Response\Html;

class IndexController implements ControllerInterface
{
    private AdapterInterface $adapter;

    private Html $html;

    /**
     * @param AdapterInterface $adapter
     * @param Html             $html
     */
    public function __construct(
        AdapterInterface $adapter,
        Html $html
    ) {
        $this->adapter = $adapter;
        $this->html = $html;
    }

    /**
     * @return Html
     */
    public function execute(): Html
    {
        $output = '';

        try {
            $connection = $this->adapter->getConnection();
            $this->html->setBody('Successful DB connection!');
            // Convention: comment `#---` is a query separator for `schema.sql` file
            $sql = file_get_contents('../config/schema.sql');
            foreach (explode('#---', $sql) as $query) {
                $query = trim($query);
                $output .= sprintf('Executing query: <br/><pre>%s</pre><br/>', htmlspecialchars($query));
                if (!$connection->query($query)) {
                    throw new \RuntimeException('Error executing query!');
                }
            }
            $output .= '<p style="font-size:32px;color:green;">Execution completed!</p>';
        } catch (\Exception $e) {
            $output .= "<p style='font-size:32px;color:red;'>{$e->getMessage()}</p>";
        }

        $this->html->setBody($output);

        return $this->html;
    }
}
