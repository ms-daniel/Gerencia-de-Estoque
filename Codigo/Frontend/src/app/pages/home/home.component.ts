import { Component } from '@angular/core';
import { CardButtonComponent } from '../../components/card-button/card-button.component';
import { SalesGraphComponent } from '../../components/sales-graph/sales-graph.component';
import { SimpleTableComponent } from '../../components/simple-table/simple-table.component';

@Component({
  selector: 'app-home',
  standalone: true,
  imports: [
    CardButtonComponent, SalesGraphComponent,
    SimpleTableComponent
  ],
  templateUrl: './home.component.html',
  styleUrl: './home.component.css'
})
export class HomeComponent {

}
