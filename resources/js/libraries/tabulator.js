//Importar el componente base
import {
  Tabulator,
  AjaxModule,
  PageModule,
  TooltipModule,
  ResponsiveLayoutModule,
  MoveColumnsModule,
  FormatModule,
  SortModule,
  FilterModule,
  EditModule,
  PopupModule
} from 'tabulator-tables';

import "tabulator-tables/dist/css/tabulator_bulma.min.css";

Tabulator.registerModule([
  AjaxModule,
  PageModule,
  TooltipModule,
  ResponsiveLayoutModule,
  MoveColumnsModule,
  FormatModule,
  SortModule,
  PopupModule,
  FilterModule,
  EditModule
]);

export default Tabulator;
