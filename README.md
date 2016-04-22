# c1_portfolio

Simple portfolio extension  for TYPO3 (written for and tested on 7.6).

## realurl configuration

```
...
    'fixedPostVars' => array(
        'portfolioDetailConfiguration' => array(
            array(
                'GETvar' => 'tx_c1portfolio_list[portfolio]',
                'lookUpTable' => array(
                    'table' => 'tx_c1portfolio_domain_model_portfolio',
                    'id_field' => 'uid',
                    'alias_field' => 'title',
                    'addWhereClause' => ' AND NOT deleted',
                    'useUniqueCache' => 1,
                    'useUniqueCache_conf' => array(
                        'strtolower' => 1,
                        'spaceCharacter' => '-'
                    )
                )
            )
        ),
        '23' => 'portfolioDetailConfiguration',
    ),
    'postVarSets' => array(
        '_DEFAULT' => array(
            'controller' => array(
                array(
                    'GETvar' => 'tx_c1portfolio_list[action]',
                    'noMatch' => 'bypass'
                ),
                array(
                    'GETvar' => 'tx_c1portfolio_list[controller]',
                    'noMatch' => 'bypass'
                )
            ),           
        ),
    ),
...
```

**Replace the PID in fixedPostVars (23) with the page id of the page with the
extension. May be added multiple times when used on multiple pages**
