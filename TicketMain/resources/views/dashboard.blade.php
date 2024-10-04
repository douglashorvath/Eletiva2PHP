<x-app-layout>
  <div class="container mt-5">
    <h2 class="text-center mb-4">Bem-vindo ao Sistema de Gerenciamento de Eventos</h2>
    <p class="text-center">Gerencie seus eventos de forma eficiente e fácil.</p>

    <div class="row mt-4">
      <div class="col-md-6 col-lg-3">
        <div class="card text-center shadow-sm mb-4">
          <div class="card-body">
            <i class="fas fa-plus-circle fa-2x text-primary"></i>
            <h5 class="card-title mt-3">Registrar Novos Eventos</h5>
            <p class="card-text">Adicione novos eventos e comece a sua jornada.</p>
            <a href="{{ route('events.create') }}" class="btn btn-primary">Adicionar Evento</a>
          </div>
        </div>
      </div>

      <div class="col-md-6 col-lg-3">
        <div class="card text-center shadow-sm mb-4">
          <div class="card-body">
            <i class="fas fa-calendar-alt fa-2x text-success"></i>
            <h5 class="card-title mt-3">Visualizar Eventos Próximos</h5>
            <p class="card-text">Veja os eventos que ocorrerão nos próximos 30 dias.</p>
            <a href="{{ route('events.upcoming') }}" class="btn btn-success">Ver Próximos</a>
          </div>
        </div>
      </div>

      <div class="col-md-6 col-lg-3">
        <div class="card text-center shadow-sm mb-4">
          <div class="card-body">
            <i class="fas fa-calendar-check fa-2x text-warning"></i>
            <h5 class="card-title mt-3">Visualizar Todos os Eventos</h5>
            <p class="card-text">Veja todos os eventos registrados no sistema.</p>
            <a href="{{ route('events.index') }}" class="btn btn-warning">Ver Todos</a>
          </div>
        </div>
      </div>

      <div class="col-md-6 col-lg-3">
        <div class="card text-center shadow-sm mb-4">
          <div class="card-body">
            <i class="fas fa-calendar-times fa-2x text-danger"></i>
            <h5 class="card-title mt-3">Visualizar Eventos Concluídos</h5>
            <p class="card-text">Consulte todos os eventos que já foram realizados.</p>
            <a href="{{ route('events.completed') }}" class="btn btn-danger">Ver Concluídos</a>
          </div>
        </div>
      </div>
    </div>

    <div class="text-center mt-4">
      <a href="{{ route('events.index') }}" class="btn btn-primary btn-lg">Ir para Eventos</a>
    </div>
  </div>
</x-app-layout>