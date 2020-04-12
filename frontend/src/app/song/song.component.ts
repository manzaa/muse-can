import { Component, OnInit } from '@angular/core';
import { ApiService } from '../api.service';

@Component({
  selector: 'app-song',
  templateUrl: './song.component.html',
  styleUrls: ['./song.component.css']
})
export class SongComponent implements OnInit {
    constructor(private apiService: ApiService) { }
    details:  Detail[];
    selectedDetail:  Detail  = { id :  null , name:null, length:  null};
    ngOnInit() {
	  this.apiService.readDetails().subscribe((details: Detail[])=>{
      this.details = details;
      console.log(this.details);
    })
  }
  createOrUpdateDetail(form){
    if(this.selectedDetail && this.selectedDetail.id){
      form.value.id = this.selectedDetail.id;
      this.apiService.updateDetail(form.value).subscribe((detail: Detail)=>{
        console.log("Detail updated" , detail);
      });
    }
    else{
      this.apiService.createDetail(form.value).subscribe((detail: Detail)=>{
        console.log("Detail created, ", detail);
      });
    }

  }

  selectDetail(detail: Detail){
    this.selectedDetail = detail;
  }

  deleteDetail(id, menu){
    this.apiService.deleteDetail(id, menu).subscribe((detail: Detail)=>{
      console.log("Detail deleted, ", detail);
    });
  }

}
