import { Component, OnInit } from '@angular/core';
import { Subcategory } from '../../../_models/subcategory';
import { ActivatedRoute } from '@angular/router';
import { FormsModule } from '@angular/forms';



@Component({
  selector: 'app-edit-subcategory',
  standalone: true,
  imports: [FormsModule],
  templateUrl: './edit-subcategory.component.html',
  styleUrl: './edit-subcategory.component.css'
})
export class EditSubcategoryComponent implements OnInit {
  subcategory: Subcategory = {Id: 0, Name: ''};
  subcategoryId: number = 0;

  constructor(private route: ActivatedRoute) {}

  ngOnInit(): void {
    this.subcategoryId = Number(this.route.snapshot.paramMap.get('id')) || 0;
  }
}
